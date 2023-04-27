<?php
//front/welcome.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 17/07/2023
 */
 
$title = 'Bienvenida del sistema de la Nómina de Rinku';
$style = '.menu-trigger:before {
	 box-shadow: 0 6px #0406e6, 0 12px #fff, 0 18px #0406e6, 0 24px #fff;
         }';
$link = '<link rel="stylesheet" type="text/css" href="front/styles/base.css">';
$meta = '';
$script = '';
$bodyProperties = 'style="background: #0406e6;"';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
    exit;
} else {

ob_start();
?>

<div class="content">
    <div class="slide">
	<h2 class="word word--style">Bienvenido</h2>
    </div>
    <script src="front/js/charming.min.js"></script>
    <script src="front/js/welcome.js"></script>
    <script src="front/js/wordFx.js"></script>
    <script>
            {
                const effect = [
                    // Effect
                    {
                        options: {
                            shapeColors: ['#0671e6'],
                            shapeTypes: ['circle'],
                            shapeFill: false,
                            shapeStrokeWidth: 3
			},
			hide: {
                            lettersAnimationOpts: {
				duration: 300,
				delay: (t,i,total) => i*25,
				easing: 'easeOutQuad',
				opacity: {
                                    value: 0, 
                                    duration: 100, 
                                    delay: (t,i,total) => i*25,
                                    easing: 'linear'
				},
				translateY: ['0%','-50%']
                            },
                            shapesAnimationOpts: {
                                duration: 300,
				delay: (t,i) => i*20,
				easing: 'easeOutExpo',
				translateX: t => anime.random(-10,10),
				translateY: t => -1*anime.random(400,800),
				scale: [0.3,0.3],
				opacity: [
                                    {
                                        value: 1, 
					duration:1, 
					delay: (t,i) => i*20
                                    }, 
                                    {
					value: 0,
					duration: 300, 
					easing: 'linear'
                                    }
				]
                            }
			},
			show: {
                            lettersAnimationOpts: {
                                duration: 800,
				delay: (t,i,total) => Math.abs(total/2-i)*60,
				easing: 'easeOutElastic',
				opacity: [0,1],
				translateY: ['50%', '0%']
                            },
                            shapesAnimationOpts: {
                                duration: 700,
				delay: (t,i) => i*60,
				easing: 'easeOutExpo',
				translateX: () => {
                                    const rand = anime.random(-100,100);
                                    return [rand,rand];
				},
				translateY: () => {
                                    const rand = anime.random(-100,100);
                                    return [rand,rand];
				},
				scale: () => [randomBetween(0.1,0.3),randomBetween(0.5,0.8)],
				opacity: [{value: 1, duration:1, delay: (t,i) => i*80}, {value:0,duration: 700, easing: 'easeOutQuad',delay: 100}]
                            }
			}
                    },	
		];
		this.DOM = {};
		this.DOM.words = Array.from(document.querySelector('.slide').querySelectorAll('.word'));
		const word = new Word(this.DOM.words[0], effect[0].options);
		this.isAnimating = true;
		word.show(effect[0].show).then(() => this.isAnimating = false);
            }
    </script>
</div>

<?php $scrollContent = ob_get_clean();
      include 'menu.php'; } ?>

