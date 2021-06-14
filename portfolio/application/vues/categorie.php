<section>
    <?php $uneCateg = VariablesGlobales::$laCategorie; 
    $lesProduits = GestionBoutique::getLesProduitsByCategorie($_REQUEST["id"]);?>
<h2><?php  echo $uneCateg->libelleCategorie;?></h2>
    <?php
    require Chemins::VUES . 'categorieBoutique.php';
    //var_dump($lesProduits);
    foreach ($lesProduits as $unProduit) {
    ?>
    
        <article>
            <div id = "boutique">
              
          
                <aside>
                  
<!--                     <br />-->
                    <?php
                    require Chemins::VUES . 'produitUnitaire.php';
                    ?>
                </aside>
            </div>

        </article>

    <?php
      }
    ?>
</section>
