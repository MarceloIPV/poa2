<?php $menu= new plantilla(); ?>

<!--=======================================
=            Sección principal            =
========================================-->

<body id="top">

	<!--=======================================
	=            Menús Utilitarios            =
	========================================-->
	<div class="wrapper">

		<nav id="mainav" class="clear"> 

			<ul class="clear" style="display: block!important;">

				<!--========================================
				=            Maquetando el menú            =
				=========================================-->
				
				<li class="elementos__li__flex">

					<?php

						$menu->disparadorMenu();

					?>

				</li>
				
				<!--====  End of Maquetando el menú  ====-->
			

			</ul>

	    </nav>

    </div>
 
    <!--====  End of Menús Utilitarios  ====-->
	
