<?php

error_reporting(E_ALL);

?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body style="font-size:16px;">
        <nav id="amenitiesContainer">
            <div>
                <div id="amenitiesTextSize">
                    <span class="amenitiesName">
                        Wielkość czcionki
                    </span>
                    <span class="amenitiesContent">
                        <a class="amenitiesButton FontSizeBase1 amenitiesButtonChecked">A</a>
                        <a class="amenitiesButton FontSizeBase2">A</a>
                        <a class="amenitiesButton FontSizeBase3">A</a>
                        <a class="amenitiesButton FontSizeBase4">A</a>
                    </span>
                </div>
                <div id="amenitiesContrast">
                    <span class="amenitiesName">
                        Tryb widoku
                    </span>
                    <span class="amenitiesContent">
                        Normalny
                        <input class="checkboxAsSwitch" type="checkbox" id="contrastMode"/>
                        <label for="contrastMode"></label>
                        Kontrastowy
                    </span>
                </div>
                <div id="amenitiesLanguages">
                    <span class="amenitiesName">
                        Język
                    </span>
                    <div class="amenitiesContent">
                        <div class="flag lg-pl">
                            <a href="#">POLSKI</a>
                        </div>
                        <!--<div class="flag noflag"></div>
                        <div class="flag lg-pl">
                            <a href="#">POLSKI</a>
                        </div>-->
                        <div class="flag lg-gb">
                            <a href="#">ENGLISH</a>
                        </div>
                        <div class="flag lg-ua">
                            <a href="#">українськийs</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header>
            <svg id="BIPLogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 188.64791 106.62709">
                <defs>
                    <linearGradient id="BIPFlagGradient" x1="0" y1="0" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#ed1c24"/>
                                    <stop offset="100%" stop-color="#9e0b10" />
                    </linearGradient>
                    <linearGradient id="BIPGradient" x1="0" y1="0" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#c4151c" />
                                    <stop offset="100%" stop-color="#a20c11" />
                    </linearGradient>
                </defs>
                <filter id="f5">
                    <feColorMatrix in="SourceGraphic" out="Blacked" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"/>
                    <feGaussianBlur in="Blacked" out="Shadow" stdDeviation="1"/>
                    <feBlend in="SourceGraphic" in2="Shadow" mode="normal"/>
                </filter>
                <path id="BIPFlag" d="M 79.374989,94.32395 70.249741,85.19582 H 35.124872 0 V 42.86249 0.52916 h 44.317702 44.317702 v 51.46145 c 0,28.3038 -0.03041,51.46146 -0.06758,51.46146 -0.03717,0 -4.173944,-4.10766 -9.19283,-9.12812 z"/>
                <path id="BIPFlagWhite" d="M 0,24.606239 V 4.4979026 H 44.317709 88.635418 V 24.606239 44.714576 H 44.317709 0 Z"/>
                <path id="BIPText" style="" d="m 69.320835,37.346947 v -5.785599 c 0,-4.335895 0.101285,-6.174462 0.404222,-7.33751 0.931537,-3.576414 3.874394,-5.804982 7.665569,-5.804982 3.249954,0 5.801842,1.657166 7.138514,4.635669 1.679657,3.742777 0.08248,8.155522 -3.639812,10.056233 -1.817632,0.928135 -4.735348,0.968397 -6.872139,0.09483 -0.420587,-0.171945 -0.463021,0.02777 -0.463021,2.179257 0,2.636145 -0.241155,3.094109 -1.792698,3.404418 -1.160231,0.02525 -2.440635,-0.390234 -2.440635,-1.442316 z m 8.1156,-7.774005 c 1.504502,-0.0082 3.342353,-1.638732 3.452713,-3.131958 0.191114,-2.585871 -1.533956,-4.009717 -3.602444,-3.935108 -2.192967,0.0791 -3.570592,1.59906 -3.573137,3.892849 -0.0023,2.056158 1.722571,3.185124 3.722868,3.174217 z M 48.495499,33.07935 c -1.848388,-0.934742 -2.78469,-1.91061 -3.687094,-3.842902 -0.597696,-1.279832 -0.617902,-1.548485 -0.620403,-8.249027 l -0.04937,-5.803578 c -0.01232,-1.448168 0.913164,-2.272474 2.102306,-2.232168 1.17271,0.03975 1.913217,0.326227 1.913217,2.413145 v 3.92275 l 0.992187,-0.429475 c 1.503225,-0.65068 4.388789,-0.577061 6.019271,0.153569 4.055258,1.817189 5.883516,6.599413 3.997053,10.455205 -1.334715,2.72806 -3.627552,4.166995 -6.90747,4.334976 -1.312014,-0.01541 -2.713297,-0.207984 -3.759697,-0.722495 z m 5.085331,-3.562396 c 1.265626,-0.528812 1.979456,-1.799405 1.980681,-3.525538 0.07466,-3.106609 -4.045176,-4.226674 -5.906476,-2.71269 -1.321223,1.160048 -1.698781,2.585028 -1.100204,4.15238 0.801622,2.099016 2.905136,2.971999 5.025999,2.085848 z m 10.399625,3.693764 c -0.61128,-0.415375 -1.240274,-1.215911 -1.715063,-2.182813 -0.742209,-1.511485 -0.749766,-1.576784 -0.749766,-6.479124 0,-4.767853 0.02196,-4.974249 0.589434,-5.543022 0.815467,-0.817318 2.346483,-0.80685 3.01653,0.02062 0.436568,0.539139 0.495078,1.100628 0.495078,4.751019 0,4.702414 0.171881,5.574444 1.307928,6.63567 0.953196,0.890418 1.036283,1.770031 0.260368,2.756445 -0.711358,0.904349 -1.911567,0.919779 -3.204509,0.0412 z M 61.547688,14.962177 c 0.0049,-0.994035 0.848838,-2.0251 2.224109,-1.997606 1.360961,0.02721 2.158443,0.835466 2.109454,2.248958 -0.04677,1.34954 -1.323461,2.289759 -2.162461,2.240913 -1.844624,-0.107392 -2.177919,-1.105501 -2.171102,-2.492265 z"/>
                <text x="95" y="19">biuletyn</text>
                <text x="95" y="38">informacji</text>
                <text x="95" y="57">publicznej</text>
            </svg>
            <div id="HeaderLogo">
                Biuletyn Informacji Publicznej Miasta HBZ
            </div>
            <div id="HeaderLinks">
                <a href="#"><img src="logos/fblogo.svg"/></a>
                <a href="#"><img src="logos/googlepluslogo.svg"/></a>
                <a href="#"><img src="logos/twitterlogo.svg"/></a>
                <a href="#"><img src="logos/youtubelogo.svg"/></a>
                <div id="HeaderSearch">
                    <form>
                        <input name="searchValue" type="search" placeholder="WPISZ WYSZUKIWANĄ FRAZĘ"/>
                        <label>
                            <input type="submit" name="image">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 132.29166 132.29166" height="50" width="50">
                                <path d="M 69.901997,31.389172 A 32.29948,32.299309 0 0 1 45.340483,69.90165 32.29948,32.299309 0 0 1 6.8275865,45.340603 32.29948,32.299309 0 0 1 31.388428,6.8276967 32.29948,32.299309 0 0 1 69.901753,31.388072"/>
                                <path d="M 82.020833,63.5 H 60.854167 V 82.02083 L 119.0625,126.99998 127,119.06248 Z"/>
                                <path d="M 61.010167,41.949825 A 22.965466,22.965347 0 0 1 46.468045,59.881126 22.965466,22.965347 0 0 1 23.690553,56.11365" />
                            </svg>
                        </label>
                    </form>
                </div>
            </div>
        </header>
        <nav id="topMenu">
            <ul>
                <li><a href="#">Strona główna</a></li>
                <li><a href="#">Rada Gminy - władza uchwałodawcza i kontrolna</a></li>
                <li><a href="#">Wójt Gminy - władza wykonawcza</a></li>
                <li><a href="#">Urząd Gminy</a></li>
            </ul>
        </nav>
        <div id="mainContainer">
            <section id="sideMenu">
                <?php
                $menuArray = [
                    'Strona główna' => [
                        'link' => '#',
                        'childes' => [
                            ]
                    ],
                    'Rada Gminy - władza uchwałodawcza i kontrolna' => [
                        'link' => '#',
                        'childes' => [
                            'Skład Rady' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Komisje stałe Rady Gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Uchwały Rady Gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Sesje Rady Gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Dyżury Radnych' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Sprawozdania z kadencji Rady Gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Oświadczenia majątkowe Radnych' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Terminy posiedzeń Rady Gminy Pawłowice w roku 2017' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                        ]
                    ],
                    'Wójt Gminy - władza wykonawcza' => [
                        'link' => '#',
                        'childes' => [
                            'Zarządzenia' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Sprawozdania z kadencji Wójta gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Oświadczenia majątkowe Wójta i Zastępcy Wójta' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                        ]
                    ],
                    'Urząd Gminy' => [
                        'link' => '#',
                        'childes' => [
                            'Organizacja Urzędu' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Ochrona danych osobowych' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Usługi' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Punkt Kurierski Wydziału Komunikacji i Transportu Starostwa Powiatowego w Pszczynie' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Obwieszczenia' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Ogłoszenia inne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Ogłoszenia - Ochrona środowiska' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Wykaz informacji o środowisku' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Konsultacje społeczne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Zgromadzenia publiczne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Zbiórki publiczne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Kontrole zewnętrzne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Petycje' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Oświadczenia majątkowe pracowników Urzędu' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Archiwum' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Rejestry Kancelaryjne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'PN-EN ISO 9001:2009' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                        ]
                    ],
                    'Prawo' => [
                        'link' => '#',
                        'childes' => [
                            'Statut Gminy Pawłowice' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Zarządzenia' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Uchwały Rady Gminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Strategie, plany, programy, regulaminy' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Zagospodarowanie przestrzenne' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Ustawy i Rozporządzenia' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                            'Działalność lobbingowa' => [
                                'link' => '#',
                                'childes' => [
                                    ]
                            ],
                        ]
                    ],
                    'Zamówienia/ Przetargi/ Licytacje' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Rekrutacja' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Finanse Gminy, Podatki' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Przedstawiciele Gminy w Radzie Powiatu' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Jednostki Organizacyjne Gminy' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Jednostki Pomocnicze Gminy' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Szkoły, placówki oświatowe, żłobki' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Jednostki Bezpieczeństwa Publicznego' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Organizacje pozarządowe' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Inicjatywa lokalna' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Fundusz sołecki' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                    'Wybory' => [
                        'link' => '#',
                        'childes' => [
                        ]
                    ],
                ];
                
                function GenerateMenu($Array) {
                    $Val = "";
                    foreach ($Array as $Name=>$Value) {
                        $Val .= '<a tabindex="0" '.(isset($Value['link'])?'href="'.$Value['link'].'"':"").'>'.$Name.'</a>';
                        if (count($Value['childes']) > 0) {
                            $Val .= '<ol>';
                            $Val .= '<li>'.GenerateMenu($Value['childes']).'</li>';
                            $Val .= '</ol>';
                        }
                    }
                    return $Val;
                }
                echo GenerateMenu($menuArray);
                
                ?>
            </section>
            
            <div id="sideMenuOpener">
                <svg viewbox="0 0 20 20">
                    <path d="M2,5 L18,5"/>
                    <path d="M2,10 L18,10"/>
                    <path d="M2,15 L18,15"/>
                </svg>
            </div>
            <main id="MainContent">
                <div id="breadcrumbs">
                    <a href="#">Rada Gminy - władza uchwałodawcza i kontrolna</a>
                    &#8658;
                    <a href="#">Skład Rady</a>
                    &#8658;
                    <a href="#">HBZ</a>
                </div>
                <div id="MainContentText">
                    <div id="audioSynthesis">
                        <svg id="audioSynthesisSVG" version="1.1" viewBox="0 0 52.916666 52.916666">
                            <path class="audioFill" d="m 25.929168,10.58333 c -5.747276,4.84753 -9.260417,7.9375 -9.260417,7.9375 L 6.0854168,19.84375 v 13.22917 l 10.5833342,1.32291 c 0,0 3.84394,3.14905 9.260417,7.9375 2.634736,-7.47653 2.865127,-25.24992 0,-31.75 z"/>
                            <path class="audioSound" d="M 28.529073,10.813372 A 8.0834389,16.820658 0 0 1 33.589355,26.53364 8.0834389,16.820658 0 0 1 28.421717,42.101952"/>
                            <path class="audioSound" d="m 30.734532,8.210066 a 12.334575,19.61865 0 0 1 7.72152,18.335219 12.334575,19.61865 0 0 1 -7.885334,18.157987"/>
                            <path class="audioSound" d="M 32.938794,5.6339136 A 16.05422,22.387497 0 0 1 42.988835,26.556844 16.05422,22.387497 0 0 1 32.72558,47.277529"/>
                        </svg>
                    </div>
                    <p>Lorem ipsum dolor sit amet, nec cetero invenire postulant te, accusamus sententiae sed ea. Pri nullam volutpat ei, ei mea sint iracundia. Erat menandri ut sea, vix malorum inermis ut. Eos ea semper persius dolorum. Audire viderer honestatis mel ex, eu his unum hendrerit.
                    </p>
                    <p>
                    Ut vel enim ullum explicari, vim eu doctus definiebas eloquentiam, ex eum populo iudicabit dissentias. Ornatus laboramus in eum, vis id stet erant recusabo. Te utroque sadipscing mel, ea verear detraxit vix. Iuvaret quaerendum referrentur usu te, eu pri exerci soleat praesent, erroribus conceptam cu eam. Malorum consequat at his, ad sint dicam inermis vis, est ei vero delectus. Utamur oportere mea cu. In reque tritani nostrud vix, pri ei imperdiet disputando.
                    </p>
                    <p>
                    Sale inermis cum cu. Eos eu nisl omnium imperdiet, usu ne purto denique repudiandae. Vel ad mutat instructior. Id pro ipsum quaerendum, semper ocurreret elaboraret an duo, ius ex debitis indoctum. Congue temporibus vim id, usu mundi necessitatibus at.
                    </p>
                    <p>
                    Eu eum movet scripta omnesque. Ne eam vidit oblique fuisset, eu his fabulas scaevola suscipiantur. Ea est vidit constituam. In atqui utinam maiestatis eum, an mel ullum elitr.
                    </p>
                    <p>
                    Nec debet sonet necessitatibus cu. Cu mel munere maluisset mediocritatem, no prima consectetuer duo. Aperiam accumsan copiosae an has, has mucius vocibus menandri eu. Te per appareat verterem, te novum quaeque inciderint pri, forensibus suscipiantur id pro. Eam ne posse nusquam, integre expetenda vulputate ex qui. Eu vis ipsum veniam utinam. Offendit gubergren qui in.
                    </p>
                    <p>
                    Mea ad cetero regione comprehensam. Qui id postulant similique. An quo idque dicunt vituperatoribus, ex his ubique indoctum. Diceret albucius sea no, bonorum scribentur adversarium pri at. Eleifend sadipscing intellegebat qui ex. Eam suas noster bonorum ex, eum quot feugiat detracto at.
                    </p>
                    <p>
                    Mel id ludus legere. Magna libris aperiri nam no, audiam consulatu vim no, et dicant ornatus his. Usu sint vero consul ad, sea eirmod docendi necessitatibus ad. Qui alterum molestie erroribus id, an tota dicit platonem duo, et essent torquatos eloquentiam pri. An vis fastidii appetere persecuti.
                    </p>
                    <p>
                    Prima modus vivendum vel ut, vim nisl quidam no. Eos at detracto antiopam, ea duis detraxit mel. Nostrum expetenda usu id, eam id primis oporteat posidonium, oratio scribentur an sea. Hinc euismod adolescens sed ut. Nisl tation consulatu eu sit, an prima regione gloriatur vim, sanctus percipit voluptatum per cu.
                    </p>
                    <p>
                    Eam ea inermis fastidii rationibus. Duo mediocrem sapientem ei, illud appareat interpretaris eum an. Usu et doctus recteque disputando, in eius saperet pri. Nullam maluisset percipitur ex qui.
                    </p>
                    <p>
                    Vulputate democritum at sea. Nonumes civibus id has, eos et quaeque facilisi tincidunt. Iisque bonorum scriptorem ea vim. Est virtute suscipit consequat ea, libris expetenda constituto vel ne, cum verear numquam in. Unum atqui populo nam ne, et idque habemus pri, ei eum nostro legimus appetere.
                    </p>
                    <p>
                    Ei iudico fabulas oporteat pro, vix et summo tation persequeris, eros abhorreant ad usu. Mollis docendi scripserit no usu. Et ornatus forensibus contentiones sit. Suas maiorum dissentiunt ut usu, veritus pertinax oportere at pro. Te mea delectus incorrupte, nostro maiorum voluptua et est. Ne impetus pertinacia quo, eam an homero luptatum, ea per velit inimicus.
                    </p>
                    <p>
                    Dicta minim definitiones ut duo, ut alii mundi accusamus eos. Ex sea idque iriure theophrastus, eos in delenit tractatos expetendis. Reque tempor neglegentur ea has, ut mei mucius numquam sadipscing. Laoreet singulis pertinacia vel cu, no pri option percipitur contentiones. Labitur gubergren qui ne, in quando graecis sed.
                    </p>
                    <p>
                    Elit tincidunt omittantur ex vel. Est elitr facilisis ea, sumo scriptorem ex sit. Timeam prodesset inciderint nam ex, ad eam delenit splendide persecuti, quo iudico lucilius ad. Graeco adipiscing scriptorem eam te.
                    </p>
                    <p>
                    Eos ex errem vivendo constituto. Ut his scripta probatus appellantur, eos perfecto comprehensam in. Cetero salutandi urbanitas sed et, case nobis primis in est. Nemore erroribus no cum. Vel at sanctus elaboraret cotidieque, vix ei posse exerci vocibus. Libris option dissentiet te usu, cu pri aperiri epicurei.
                    </p>
                    <p>
                    Ut sit vidit delicata, at mei feugiat singulis, te tantas verear partiendo mel. At mel iusto appareat. Cum alii suas reprimique ea, ius id assum corrumpit, eam an recteque cotidieque. Ut quo tollit homero saperet. Timeam salutatus ex has, in has invidunt accusata erroribus.
                    </p>
                    <p>
                    Alterum habemus vel eu. Eu mei tamquam accusam probatus, nibh debet voluptaria has ad, in duis partiendo pri. Dolorem tractatos ius ex, his an habeo choro, an quot vitae cetero sea. Nec at partiendo expetendis concludaturque, ut adhuc nostrud vituperata duo.
                    </p>
                    <p>
                    Eu has munere nonumy, et etiam erant vivendo pri. Has menandri constituto ex, ea stet quando numquam mei, debet dolores conclusionemque his ne. Te vel iisque ancillae eligendi. Legendos adolescens in eos.
                    </p>
                    <p>
                    Per natum prima vivendo et, adhuc impetus reprimique has cu. Adhuc equidem sea at. Vix eu sanctus splendide vituperatoribus, has sapientem salutatus cu. Id velit aliquid pertinax vis, ea primis ceteros vel. Mel libris nominati dignissim cu.
                    </p>
                    <p>
                    Ei quo incorrupte intellegam. Pri solum erant disputationi an, enim persequeris has in, pri scriptorem dissentiet te. Laboramus rationibus cum an, eu mel meis noluisse. Ne vis diam habemus epicurei. Qui id affert torquatos. Vim ex aperiri omnesque.
                    </p>
                    <p>
                    Sit ei dolore signiferumque. Ut nec erant regione, cu vero delectus constituto est. Mea ei natum oratio. Vim etiam doctus at.
                    </p>
                    <p>
                    Dicam graeci omittantur est ei, ei mea rebum partem delenit, quo no altera veritus. Sit te probo essent eligendi, petentium tincidunt ei vis. Dissentias efficiantur cu ius, oratio pertinacia contentiones an mei. Vis eu oportere consequuntur, hinc vocent abhorreant pro ea.
                    </p>
                    <p>
                    Ex est legere tritani incorrupte, nisl habeo eu mel, in mel dicunt appareat. Quodsi patrioque eu eam, an nam probo error assentior, cu pri euripidis similique. An pri ubique nominavi. Commodo nusquam ex vim. At est elit quando interesset, dicam repudiare conceptam ad nec, cu sonet possim gubergren sit. Idque detraxit splendide quo at.
                    </p>
                    <p>
                    Te pro wisi aeterno patrioque, complectitur conclusionemque ne vis. No quem velit vis. Nihil altera ridens pro ad. Aperiri bonorum accusam vel cu, per unum malis omnium in, ad usu homero euismod delectus. Vel ea viris oporteat lobortis, dicta volumus aliquando no sea, duo vide epicurei at.
                    </p>
                    <p>
                    Odio noster no vix, ea pri errem inermis conceptam. Sensibus reprimique cotidieque.
                    </p>
                </div>
            </main>
            <section id="sideMenu" class="sideMenuRight">
                <?php
                echo GenerateMenu($menuArray);
                ?>
            </section>
        </div>
        <footer>
            <div>
                <div id="FooterMenu">
                    <ul>
                        <li><a href="#">Strona główna</a></li>
                        <li><a href="#">Instrukcja korzystania ze strony BIP</a></li>
                        <li><a href="#">Redakcja BIP</a></li>
                        <li><a href="#">Mapa serwisu</a></li>
                        <li><a href="#">H</a></li>
                        <li><a href="#">B</a></li>
                        <li><a href="#">Z</a></li>
                    </ul>
                </div>
                <div id="FooterContent">
                    footer
                </div>
            </div>
        </footer>
        <div id="cookies">
            <span>
                Serwis ten wykorzystuje pliki cookies, które są zapisywane przez przeglądarkę na dysku twardym użytkownika w celu ułatwienia poruszania się po witrynie oraz dostosowania Serwisu do preferencji użytkownika. Szczegółowe informacje o plikach cookies można znaleźć tutaj.
                Istnieje możliwość zablokowania zapisywania plików cookies poprzez odpowiednią konfigurację przeglądarki internetowej, jednak blokada ta może spowodować niepoprawne działanie niektórych funkcji w serwisie. Brak zmiany ustawień przeglądarki internetowej na blokowanie zapisu cookies jest jednoznaczne z wyrażeniem zgody na ich zapisywanie.
            </span>
            <div id="cookiesClose">
                ✖
            </div>
        </div>
    </body>
</html>
<script async src="sidemenu.js"></script>
<script async src="sidemenu_mobile.js"></script>
<script async  src="cookies.js"></script>
<script async  src="AdditionalSettings.js"></script>
<script src="speechSynthesis.js"></script>
<script>
    var BIPspeechSynthesisObject = new BIPspeechSynthesis("#audioSynthesis", "#MainContentText", "pl-PL");
</script>