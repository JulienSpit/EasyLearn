<?php
include_once ("include/autoload.php");
if(isset($_POST["action"])) {
    $retour = new stdClass();
    $retour->result = false;
    switch ($_POST["action"]){
        case "supprimer":
            //$_POST["id"]
            $bd->query(
                "DELETE FROM List WHERE List.Prk_List = :id;",
                array(
                    ":id" => $_POST["id"]
                )
            );
            $bd->query(
                "DELETE FROM Couple WHERE Couple.FrK_List = :id;",
                array(
                    ":id" => $_POST["id"]
                )
            );
            $retour->result = true;
            break;
        default: return;
    }
    echo json_encode($retour);
}
else{?>
<div class="ui tab" data-tab="listes">
    <!-- start header -->
    <h2 class="ui header">
        <i class="settings icon"></i>
        <div class="content">
            Mes listes
            <div class="sub header">Ajouter, modifier ou supprimer une liste</div>
        </div>
    </h2>
    <!-- end header -->

    <!-- start body -->
    <div class="row">
        <?php if(isset($_SESSION["User"])) {?>
            <table class="ui celled table center aligned">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Exercice</th>
                    <th>Thème</th>
                    <th>Publique</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $lignes = $bd->query(
                        "SELECT List.Prk_List, List.Name as ListName, Exercise.Name as ExerciseName, Theme.Name as ThemeName, List.State as ListState
                            FROM List INNER JOIN Exercise ON List.FrK_Exercise = Exercise.PrK_Exercise INNER JOIN Theme ON List.FrK_Theme = Theme.PrK_Theme
                            WHERE List.FrK_Account = :id
                            ORDER BY List.Name ASC;",
                        array(
                            ":id" => $_SESSION["User"]->getId()
                        )
                    );
                    if (count($lignes) > 0) {
                        for ($i = 0; $i < count($lignes); $i++) {
                            ?>
                            <tr data-id="<?=$lignes[$i]->Prk_List?>">
                                <td><?=$lignes[$i]->ListName?></td>
                                <td><?=$lignes[$i]->ExerciseName?></td>
                                <td><?=$lignes[$i]->ThemeName?></td>
                                <?php
                                if ($lignes[$i]->ListState) {
                                    ?>
                                    <td class="positive"><i class="check circle icon"></i></td>
                                <?php } else {
                                    ?>
                                    <td class="negative"><i class="remove circle icon"></i></td>
                                <?php } ?>
                                <td class="three wide center aligned">
                                    <div class="ui mini buttons">
                                        <button class="ui button">
                                            <i class="ellipsis horizontal icon"></i>
                                            Modifier
                                        </button>
                                        <button class="ui negative button">
                                            <i class="remove icon"></i>
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                    <tr>
                        <td colspan="5">
                            <div class="ui primary button addList">
                                <i class="plus square outline icon"></i>
                                Ajouter
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
    <?php }
    else {?>
        <h2 class="ui centered header">Veuillez vous connecter afin de visualiser vos listes</h2>
    <?php }?>
</div>
<div class="ui modal modSuppr">
    <div class="header">Supprimer</div>
    <div class="content">
        <p>Êtes-vous sûre de vouloir supprimer cette liste ?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">Non</div>
        <div class="ui right labeled icon positive button"><i class="check circle icon"></i>Oui</div>
    </div>
</div>
<div class="ui coupled modal" id="modCrea1">
    <div class="header">Création de liste</div>
    <div class="content">
        <form name="creation1" class="ui form">
            <div class="field">
                <label>Nom</label>
                <input type="text" name="listName"/>
            </div>
            <div class="inline fields">
                <div class="field">
                    <label>Public</label>
                    <input type="radio" name="listPublic" value="1" checked>
                </div>
                <div class="field">
                    <label>Privé</label>
                    <input type="radio" name="listPublic" value="0">
                </div>
            </div>
            <div class="field">
                <label>Exercice</label>
                <select name="listExo" class="ui dropdown">
                    <option value="">Exercice</option>
                    <?php
                    $ex = $bd->query("SELECT * FROM Exercise");
                    for ($i = 0; $i < count($ex); $i++) {?>
                        <option value="<?=$ex[$i]->PrK_Exercise?>"><?=$ex[$i]->Name?></option>
                    <?}?>
                </select>
            </div>
            <div class="field">
                <label>Theme</label>
                <select name="listTheme" class="ui dropdown">
                    <option value="">Theme</option>
                    <?php
                        $themes = $bd->query("SELECT * FROM Theme");
                        for ($i = 0; $i < count($themes); $i++) {?>
                            <option value="<?=$themes[$i]->PrK_Theme?>"><?=$themes[$i]->Name?></option>
                        <?}?>
                </select>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui negative button">Annuler</div>
        <div class="ui positive button">Continuer</div>
    </div>
</div>
    <div class="ui coupled modal" id="modCrea2">
    <div class="header">Création de vos mots</div>
    <div class="content">
        <form name="creation2" class="ui form">
            <div class="inline fields">
                <div class="field">
                    <label>Mot n°1</label>
                    <input type="text" name="Item1"/>
                </div>
                <div class="field">
                    <label>Mot n°2</label>
                    <input type="text" name="Item2"/>
                </div>
                <div class="field">
                    <button class="ui icon button">
                        <i class="plus icon"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui positive button">Continuer</div>
    </div>
</div>
<?php }?>
