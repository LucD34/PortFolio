<section>
<h2>Boutique</h2>
    <?php

    require Chemins::VUES . 'categorieBoutique.php';

    
    
    foreach (VariablesGlobales::$lesProduits as $unProduit) {   
    ?>
    
        <article>
          <div id = "boutique">

           <aside>
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