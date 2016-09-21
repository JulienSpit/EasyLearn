<!-- start header -->
<h2 class="ui header">
    <i class="settings icon"></i>
    <div class="content">
        Mes listes
        <div class="sub header">Ajouter, modifier ou supprimer une liste</div>
    </div>
</h2>
<!-- end header -->

<!-- start body connected -->
<div class="row">
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
                    "SELECT List.Prk_List ListId, List.Name ListName, Exercise.Name ExerciseName, Theme.Name ThemeName, List.State ListState
                    FROM List INNER JOIN Exercise ON List.FrK_Exercise = Exercise.PrK_Exercise INNER JOIN Theme ON List.FrK_Theme = Theme.PrK_Theme
                    WHERE List.FrK_Account = 1
                    ORDER BY List.Name ASC;",
                    array(
                        /*":id" => $user->id*/
                    )
                );
                for($i=0; $i<count($lignes);$i++)
                {?>
                    <tr data-id="<?php echo $lignes[$i]->ListID;?>">
                        <td><?php echo $lignes[$i]->ListName; ?></td>
                        <td><?php echo $lignes[$i]->ExerciseName; ?></td>
                        <td><?php echo $lignes[$i]->ThemeName; ?></td>
                        <?php
                            if($lignes[$i]->ListState)
                            {?>
                                <td class="positive"><i class="check circle icon"></i></td>
                            <?php }
                            else
                            {?>
                                <td class="negative"><i class="remove circle icon"></i></td>
                            <?php }?>
                        <td class="three wide center aligned">
                            <div class="ui buttons">
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
                <?php }?>
                    <tr>
                        <td colspan="5">
                            <div class="ui primary button">
                                <i class="plus square outline icon"></i>
                                Ajouter
                            </div>
                        </td>
                    </tr>
        </tbody>
    </table>
</div>
<!-- end body connected -->

<!-- start body unconnected -->

<!-- end body unconnected -->
