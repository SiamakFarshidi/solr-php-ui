<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Vincent Link, Steffen Lohmann, Eduard Marbach, Stefan Negru, Vitalis Wiens" />
    <meta name="keywords" content="webvowl, vowl, visual notation, web ontology language, owl, rdf, ontology visualization, ontologies, semantic web" />
    <meta name="description" content="WebVOWL - Web-based Visualization of Ontologies" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="css/webvowl.css" />
    <link rel="stylesheet" type="text/css" href="css/webvowl.app.css" />
    <link rel="icon" href="/images/envri_logo_final.png" type="image/x-icon" />
    <title>Ontology Visualization</title>
</head>

<body>
    <main>
        <section id="canvasArea">
            <div id="browserCheck" class="hidden">

            </div>

            <div id="logo" class="noselect">
                <h2>
                    <img src="/images/envri_logo_final.png" style="width:80px; height:62px;" />
                </h2>
            </div>


            <div id="loading-info" class="hidden">
                <div id="loading-progress" style="border-radius: 10px;">
                    <div class="hidden">Loading ontology...</div>
                    <div id="layoutLoadingProgressBarContainer" style="padding-bottom: 0;	white-space: nowrap;	overflow: hidden;	text-overflow: ellipsis;">
                        <h4 id="currentLoadingStep" style="margin: 0;font-style: italic; padding-bottom:0 ;	white-space: nowrap;	overflow: hidden;	text-overflow: ellipsis;">
                            Layout optimization</h4>
                        <div id="progressBarContext">
                            <div id="progressBarValue" class="busyProgressBar"></div>
                        </div>
                    </div>
                    <div id="loadingInfo_msgBox" style="padding-bottom: 0;padding-top:0">
                        <div id="show-loadingInfo-button" class="accordion-trigger noselect">Details</div>
                        <div id="loadingInfo-container">
                            <ul id="bulletPoint_container"></ul>
                        </div>
                    </div>
                    <div>
                        <span id="loadingIndicator_closeButton" class="">Close Warning</span>
                    </div>
                </div>
            </div>

            <div id="additionalInformationContainer">
                <div id="reloadCachedOntology" class="hidden" title="">

                    <svg viewBox="38 -12.5 18 18" class="reloadCachedOntologyIcon btn_shadowed" id="reloadSvgIcon">
                        <g>
                            <text id="svgStringText" dx="5px" dy="-1px" style="font-size:9px;">Reload ontology</text>
                            <path style="fill : #444; stroke-width:0;" d="m 42.277542,5.1367119 c -5.405,0 -10.444,1.577 -14.699,4.282 l -5.75,-5.75 0,16.1100001 16.11,0 -6.395,-6.395 c 3.18,-1.787 6.834,-2.82 10.734,-2.82 12.171,0 22.073,9.902 22.073,22.074 0,2.899 -0.577,5.664 -1.599,8.202 l 4.738,2.762 c 1.47,-3.363 2.288,-7.068 2.288,-10.964 0,-15.164 -12.337,-27.5010001 -27.5,-27.5010001 m 11.5,46.7460001 c -3.179,1.786 -6.826,2.827 -10.726,2.827 -12.171,0 -22.073,-9.902 -22.073,-22.073 0,-2.739 0.524,-5.35 1.439,-7.771 l -4.731,-2.851 c -1.375,3.271 -2.136,6.858 -2.136,10.622 0,15.164 12.336,27.5 27.5,27.5 5.406,0 10.434,-1.584 14.691,-4.289 l 5.758,5.759 0,-16.112 -16.111,0 6.389,6.388 z" transform="matrix(0.20,0,0,0.20,75,-10)">
                            </path>
                        </g>
                    </svg>
                    <span id="reloadCachedOntologyString" class="noselect" style="font-style: italic;font-size: 10px">Loaded cached ontology</span>
                </div>

                <div id="FPS_Statistics" class="hidden debugOption">FPS: 0<br>Nodes: 0<br>Links: 0</div>
                <span class="hidden debugOption" id="modeOfOperationString">mode of operation</span>

            </div>

            <div id="graph"></div>

            <div id="dragDropContainer" class="hidden">
                <div id="drag_dropOverlay"></div>

                <div id="drag_msg">
                    <svg id="drag_svg" style="position: absolute; left:25%;top:25%;width:50%; height:50%">
                        <g id="drag_icon_group">
                            <path id="drag_icon" style="fill : #444; stroke-width:0;" d="m 9.0000002,-8.9899999 -18.0000001,0 c -1.1000001,0 -1.9999991,0.9 -1.9999991,2 l 0,3.99 1.9999991,0 0,-4.01 18.0000001,0 0,14.0299996 -18.0000001,0 0,-4.02 -1.9999991,0 0,4.01 c 0,1.1 0.899999,1.98 1.9999991,1.98 l 18.0000001,0 c 1.1000008,0 2.0000008,-0.88 2.0000008,-1.98 l 0,-13.9999996 c 0,-1.11 -0.9,-2 -2.0000008,-2 z M -1,3.9999997 3.0000001,-3.3898305e-7 -1,-3.9999999 l 0,2.9999996 -9.999999,0 0,1.99999996 9.999999,0 0,3.00000004 z" transform="matrix(5.0,0,0,5.0,0,0)">
                            </path>
                            <path id="drag_icon_drop" class="hidden" style="fill : #444; stroke-width:0;" d="m 8.9900008,8.9999991 0,-18.0000001 c 0,-1.1 -0.9,-1.999999 -2,-1.999999 l -3.99,0 0,1.999999 4.01,0 0,18.0000001 -14.0299996,0 0,-18.0000001 4.02,0 0,-1.999999 -4.01,0 c -1.1,0 -1.98,0.899999 -1.98,1.999999 l 0,18.0000001 c 0,1.1000009 0.88,2.0000009 1.98,2.0000009 l 13.9999996,0 c 1.11,0 2,-0.9 2,-2.0000009 z M -3.9999988,-1.0000011 1.2389831e-6,2.999999 4.0000008,-1.0000011 l -2.9999996,0 0,-9.9999989 -1.99999996,0 0,9.9999989 -3.00000004,0 z" transform="matrix(5.0,0,0,5.0,0,0)">
                            </path>
                        </g>
                    </svg>
                    <span id="drag_msg_text" style="font-size:14px">Drag ontology file here.</span>
                </div>
            </div>
            <div class="noselect">
                <span id="leftSideBarCollapseButton" class="btn_shadowed hidden"> > </span>
            </div>
            <div class="noselect"><span id="sidebarExpandButton" class="btn_shadowed"> > </span></div>

            <div id="containerForLeftSideBar">
                <div id="leftSideBar">
                    <div id="leftSideBarContent" class="hidden">
                        <h2 id="leftHeader">Default Element</h2>
                        <h3 class=" selectedDefaultElement accordion-trigger noselect accordion-trigger-active" id="defaultClass" title="owl:Class">Class: owl:Class
                        </h3>
                        <div id="classContainer" class="accordion-container ">
                        </div>
                        <h3 class="selectedDefaultElement accordion-trigger noselect accordion-trigger-active" title="owl:objectProperty" id="defaultProperty">Property: owl:objectProperty
                        </h3>
                        <div id="propertyContainer" class="accordion-container ">
                        </div>
                        <h3 class="selectedDefaultElement accordion-trigger noselect accordion-trigger-active" title="rdfs:Literal" id="defaultDatatype">Datatype: rdfs:Literal
                        </h3>
                        <div id="datatypeContainer" class="accordion-container ">
                        </div>
                    </div>
                </div>
            </div>
            <div id="menuContainer">
                <!--Ontology Menu-->
                <ul id="m_select" class="toolTipMenu noselect">
                    <li><a href="#foaf" id="foaf">Friend of a Friend (FOAF) vocabulary</a></li>
                    <li><a href="#goodrelations" id="goodrelations">GoodRelations Vocabulary for E-Commerce</a></li>
                    <li><a href="#muto" id="muto">Modular and Unified Tagging Ontology (MUTO)</a></li>
                    <li><a href="#ontovibe" id="ontovibe">Ontology Visualization Benchmark (OntoViBe)</a></li>
                    <li><a href="#personasonto" id="personasonto">Personas Ontology (PersonasOnto)</a></li>
                    <li><a href="#sioc" id="sioc">SIOC (Semantically-Interlinked Online Communities) Core Ontology</a></li>


                    <li class="option" id="converter-option">
                        <form class="converter-form" id="iri-converter-form">
                            <label for="iri-converter-input">Custom Ontology:</label>

                            <input type="text" id="iri-converter-input" placeholder="Enter ontology IRI">
                            <button type="submit" id="iri-converter-button" disabled>Visualize</button>
                        </form>
                        <div class="converter-form">
                            <input class="hidden" type="file" id="file-converter-input" autocomplete="off">
                            <label class="truncate" id="file-converter-label" for="file-converter-input">Select ontology
                                file</label>
                            <button type="submit" id="file-converter-button" disabled>
                                Upload
                            </button>

                        </div>
                        <div id="emptyContainer">
                            <a href="#opts=editorMode=true;#new_ontology1" id="empty" style="pointer-events:none; padding-left:0">Create new ontology</a>
                        </div>
                        <div>
                            <!--<button class="debugOption" type="submit" id="direct-text-input">-->
                            <!--Direct input-->
                            <!--</button>-->
                        </div>
                    </li>

                </ul>
                <!--Export Menu-->
                <ul id="m_export" class="toolTipMenu noselect">
                    <li><a href="#" download id="exportJson">Export as JSON</a></li>
                    <li><a href="#" download id="exportSvg">Export as SVG</a></li>
                    <li><a href="#" download id="exportTex">Export as TeX <label style="font-size: 10px">(alpha)</label></a>
                    </li>
                    <li><a href="#" download id="exportTurtle">Export as TTL <label style="font-size: 10px">(alpha)</label></a>
                    </li>

                    <li class="option" id="emptyLiHover">
                        <div>
                            <form class="converter-form" id="url-copy-form">
                                <label for="exportedUrl">Export as URL:</label>
                                <input type="text" id="exportedUrl" placeholder="#">
                                <button id="copyBt" title="Copy to clipboard">Copy</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <!--Filter Menu-->
                <ul id="m_filter" class="toolTipMenu noselect">
                    <li class="toggleOption" id="datatypeFilteringOption"></li>
                    <li class="toggleOption" id="objectPropertyFilteringOption"></li>
                    <li class="toggleOption" id="subclassFilteringOption"></li>
                    <li class="toggleOption" id="disjointFilteringOption"></li>
                    <li class="toggleOption" id="setOperatorFilteringOption"></li>
                    <li class="slideOption" id="nodeDegreeFilteringOption"></li>
                </ul>
                <!--Options Menu -->
                <ul id="m_config" class="toolTipMenu noselect">
                    <li class="toggleOption" id="zoomSliderOption"></li>

                    <li class="slideOption" id="classSliderOption"></li>
                    <li class="slideOption" id="datatypeSliderOption"></li>
                    <li class="toggleOption" id="dynamicLabelWidth"></li>
                    <li class="slideOption" id="maxLabelWidthSliderOption"></li>
                    <li class="toggleOption" id="nodeScalingOption"></li>
                    <li class="toggleOption" id="compactNotationOption"></li>
                    <li class="toggleOption" id="colorExternalsOption"></li>
                </ul>
                <!--Modes Menu -->
                <ul id="m_modes" class="toolTipMenu noselect">
                    <li class="toggleOption" id="editMode"></li>
                    <li class="toggleOption" id="pickAndPinOption"></li>
                </ul>

                <!--Debug Menu -->
                <ul id="m_debug" class="toolTipMenu noselect">
                    <li class=" toggleOption" id="useAccuracyHelper"></li>
                    <li class=" toggleOption" id="showDraggerObject"></li>
                    <li class=" toggleOption" id="showFPS_Statistics"></li>
                    <li class=" toggleOption" id="showModeOfOperation"></li>
                </ul>


                <!--About Menu-->

                <ul id="m_search" class="toolTipMenu"></ul>
            </div>
            <div class="noselect" id="swipeBarContainer">
                <ul id="menuElementContainer">
                    <li id="c_search" class="inner-addon left-addon">
                        <i class="searchIcon">
                            <svg viewBox="0 0 24 24" height="100%" width="100%" style="pointer-events: none; display: block;">
                                <g>
                                    <path id="magnifyingGlass" style="fill : #666; stroke-width:0;" d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                    </path>
                                </g>
                            </svg>
                        </i>
                        <input class="searchInputText" type="text" id="search-input-text" placeholder="Search">
                    </li>
                    <li id="c_locate">
                        <a style="padding: 0 8px 5px 8px;" draggable="false" title="Nothing to locate, enter search term." href="#" id="locateSearchResult">&#8982;
                        </a>
                    </li>
                    <li id="c_select">
                        <a draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="M3 15h18v-2H3v2zm0 4h18v-2H3v2zm0-8h18V9H3v2zm0-6v2h18V5H3z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i> Ontology</a>
                    </li>
                    <li id="c_export"><a draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i> Export</a></li>
                    <li id="c_filter"><a draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="M3 4l9 16 9-16H3zm3.38 2h11.25L12 16 6.38 6z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i>Filter</a></li>
                    <li id="c_config"><a draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="m 21.163138,13.127428 0,-2.356764 -2.546629,-0.424622 C 18.439272,9.5807939 18.137791,8.8661419 17.733863,8.218291 L 19.2356,6.116978 17.569296,4.450673 15.466841,5.951269 C 14.818953,5.548483 14.104338,5.24586 13.33909,5.067482 l -0.424622,-2.545488 -2.356764,0 -0.424622,2.545488 C 9.3689769,5.24586 8.6531829,5.548519 8.0053319,5.951269 l -2.102455,-1.500596 -1.666304,1.666305 1.501737,2.101313 c -0.403928,0.6467469 -0.705409,1.3625029 -0.882646,2.127751 l -2.546629,0.424622 0,2.356764 2.546629,0.424622 c 0.177237,0.765248 0.478718,1.4799 0.882646,2.127751 l -1.501737,2.102455 1.666304,1.666304 2.103596,-1.501737 c 0.646747,0.403928 1.362504,0.705409 2.1266091,0.882646 l 0.424622,2.546629 2.356764,0 0.424622,-2.546629 c 0.764106,-0.177237 1.4799,-0.478718 2.127751,-0.882646 l 2.102455,1.501737 1.666304,-1.666304 -1.501737,-2.102455 c 0.403928,-0.647888 0.705409,-1.363645 0.882646,-2.127751 l 2.546629,-0.424622 z m -9.427053,3.535144 c -2.6030431,0 -4.7135241,-2.110517 -4.7135241,-4.713527 0,-2.6030071 2.110518,-4.713525 4.7135241,-4.713525 2.60301,0 4.713527,2.1105179 4.713527,4.713525 0,2.60301 -2.110481,4.713527 -4.713527,4.713527 z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i>Options</a>
                    </li>
                    <li id="c_modes"><a draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.63-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i>Modes</a></li>
                    <li id="c_reset"><a draggable="false" id="reset-button" href="#" type="reset">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="m 12,5 0,-4 5,5 -5,5 0,-4 c -3.31,0 -6,2.69 -6,6 0,3.31 2.69,6 6,6 3.31,0 6,-2.69 6,-6 l 2,0 c 0,4.42 -3.58,8 -8,8 C 7.58,21 4,17.42 4,13 4,8.58 7.58,5 12,5 Z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i>Reset</a></li>
                    <li id="c_pause"><a draggable="false" id="pause-button" href="#" style="padding: 9px 8px 12px 8px;">Pause</a>
                    </li>
                    <li id="c_debug" class="debugOption"><a id="debugMenuHref" draggable="false" href="#">
                            <i>
                                <svg viewBox="0 0 24 24" class="menuElementSvgElement">
                                    <g>
                                        <path style="fill : #fff; stroke-width:0;" d="M 20,8 17.19,8 C 16.74,7.22 16.12,6.55 15.37,6.04 L 17,4.41 15.59,3 13.42,5.17 C 12.96,5.06 12.49,5 12,5 11.51,5 11.04,5.06 10.59,5.17 L 8.41,3 7,4.41 8.62,6.04 C 7.88,6.55 7.26,7.22 6.81,8 L 4,8 4,10 6.09,10 C 6.04,10.33 6,10.66 6,11 l 0,1 -2,0 0,2 2,0 0,1 c 0,0.34 0.04,0.67 0.09,1 L 4,16 l 0,2 2.81,0 c 1.04,1.79 2.97,3 5.19,3 2.22,0 4.15,-1.21 5.19,-3 l 2.81,0 0,-2 -2.09,0 C 17.96,15.67 18,15.34 18,15 l 0,-1 2,0 0,-2 -2,0 0,-1 c 0,-0.34 -0.04,-0.67 -0.09,-1 L 20,10 Z m -4,4 0,3 c 0,0.22 -0.03,0.47 -0.07,0.7 L 15.83,16.35 15.46,17 C 14.74,18.24 13.42,19 12,19 10.58,19 9.26,18.23 8.54,17 L 8.17,16.36 8.07,15.71 C 8.03,15.47 8,15.22 8,15 L 8,11 C 8,10.78 8.03,10.53 8.07,10.3 L 8.17,9.65 8.54,9 C 8.84,8.48 9.26,8.03 9.75,7.69 L 10.32,7.3 11.06,7.12 C 11.37,7.04 11.69,7 12,7 c 0.32,0 0.63,0.04 0.95,0.12 l 0.68,0.16 0.61,0.42 c 0.5,0.34 0.91,0.78 1.21,1.31 l 0.38,0.65 0.1,0.65 C 15.97,10.53 16,10.78 16,11 Z" transform="matrix(0.75,0,0,0.75,3.5,2.5)">
                                        </path>
                                    </g>
                                </svg>
                            </i>
                            Debug</a></li>
                </ul>
            </div>
            <div class="noselect" id="scrollRightButton"></div>
            <div class="noselect" id="scrollLeftButton"></div>
            <div id="zoomSlider" class="btn_shadowed">
                <p class="noselect" id="centerGraphButton">&#8982;</p>
                <p class="noselect" id="zoomInButton">+</p>
                <p class="noselect" id="zoomSliderParagraph"></p>
                <p class="noselect" id="zoomOutButton">-</p>
            </div>
        </section>
        <aside id="detailsArea" style="background-color: #18202A;">
            <section id="generalDetailsEdit" class="hidden">
                <h1 id="editHeader" style="font-size: 1.1em;">Editing Options</h1>
                <h3 class="accordion-trigger noselect accordion-trigger-active">Ontology</h3>
                <div>
                    <!--begin of ontology metaData -->
                    <div class="textLineEditWithLabel">
                        <form class="converter-form-Editor " id="titleEditForm">
                            <label class="EditLabelForInput" id="titleEditor-label" for="titleEditor" title="Ontology title as dc:title">Title:</label>
                            <input class="modifiedInputStyle" type="text" id="titleEditor" autocomplete="off" value="">
                        </form>
                    </div>
                    <div class="textLineEditWithLabel">
                        <form class="converter-form-Editor " id="iriEditForm">
                            <label class="EditLabelForInput" id="iriEditor-label" for="iriEditor">IRI:</label>
                            <input type="text" id="iriEditor" autocomplete="off" value="">
                        </form>
                    </div>
                    <div class="textLineEditWithLabel">
                        <form class="converter-form-Editor " id="versionEditForm">
                            <label class="EditLabelForInput" id="versionEditor-label" for="versionEditor" title="Ontology version number as owl:versionInfo">Version:</label>
                            <input type="text" id="versionEditor" value="" autocomplete="off">
                        </form>
                    </div>
                    <div class="textLineEditWithLabel">
                        <form class="converter-form-Editor " id="authorsEditForm">
                            <label class="EditLabelForInput" id="authorsEditor-label" for="authorsEditor" title="Ontology authors as dc:creator">Authors:</label>
                            <input type="text" id="authorsEditor" value="" autocomplete="off">
                        </form>
                    </div>
                    <h4 class="subAccordion accordion-trigger noselect">Prefix</h4>
                    <div class="subAccordionDescription" id="containerForPrefixURL">
                        <div id="prefixURL_Description">
                            <span class="boxed ">Prefix</span>
                            <span class="boxed">IRI</span>
                        </div>
                        <div id="prefixURL_Container"></div>
                        <div align="center" id="containerForAddPrefixButton">
                            <button id="addPrefixButton">Add Prefix</button>
                        </div>
                    </div>
                </div>
                <!--end of ontology metaData -->

                <h3 class="accordion-trigger noselect">Description</h3>
                <div>
                    <textarea rows="4" cols="25" title="Ontology description as dc:description" class="descriptionTextClass" id="descriptionEditor"></textarea>
                </div>
                <h3 class="accordion-trigger noselect accordion-trigger-active">Selected Element</h3>
                <div>
                    <div id="selectedElementProperties" class="hidden">
                        <div class="textLineEditWithLabel">
                            <form class="converter-form-Editor " id="element_iriEditForm">
                                <label class="EditLabelForInput" id="element_iriEditor-label" for="element_iriEditor">IRI:</label>
                                <input type="text" id="element_iriEditor" autocomplete="off" value="">
                            </form>
                        </div>
                        <div class="textLineEditWithLabel">
                            <form class="converter-form-Editor " id="element_labelEditForm">
                                <label class="EditLabelForInput" id="element_labelEditor-label" for="element_labelEditor">Label:</label>
                                <input type="text" id="element_labelEditor" autocomplete="off" value="">
                            </form>
                        </div>
                        <div class="textLineEditWithLabel">
                            <form class="converter-form-Editor" id="typeEditForm">
                                <label class="EditLabelForInput" id="typeEditor-label" for="typeEditor">Type:</label>
                                <select id="typeEditor" class="dropdownMenuClass"></select>
                            </form>
                            <form class="converter-form-Editor" id="typeEditForm_datatype">
                                <label class="EditLabelForInput" id="typeEditor_datatype-label" for="typeEditor_datatype">Datatype:</label>
                                <select id="typeEditor_datatype" class="dropdownMenuClass"></select>
                            </form>
                        </div>
                        <div class="textLineEditWithLabel" id="property_characteristics_Container"> Characteristics:
                            <div id="property_characteristics_Selection" style="padding-top:2px;"></div>
                        </div>

                    </div>
                    <div id="selectedElementPropertiesEmptyHint">
                        Select an element in the visualization.
                    </div>
                </div>

            </section>
            <section id="generalDetails" class="hidden">
                <h1 id="title"></h1>
                <span><a id="about" href=""></a></span>
                <h5>Version: <span id="version"></span></h5>
                <h5>Author(s): <span id="authors"></span></h5>
                <h5>
                    <label>Language: <select id="language" name="language" size="1"></select></label>
                </h5>
                <h3 class="accordion-trigger noselect accordion-trigger-active">Description</h3>
                <div class="accordion-container scrollable">
                    <p id="description"></p>
                </div>
                <h3 class="accordion-trigger noselect">Metadata</h3>
                <div id="ontology-metadata" class="accordion-container"></div>
                <h3 class="accordion-trigger noselect">Statistics</h3>
                <div class="accordion-container">
                    <p class="statisticDetails">Classes: <span id="classCount"></span></p>
                    <p class="statisticDetails">Object prop.: <span id="objectPropertyCount"></span></p>
                    <p class="statisticDetails">Datatype prop.: <span id="datatypePropertyCount"></span></p>
                    <div class="small-whitespace-separator"></div>
                    <p class="statisticDetails">Individuals: <span id="individualCount"></span></p>
                    <div class="small-whitespace-separator"></div>
                    <p class="statisticDetails">Nodes: <span id="nodeCount"></span></p>
                    <p class="statisticDetails">Edges: <span id="edgeCount"></span></p>
                </div>
                <h3 class="accordion-trigger noselect" id="selection-details-trigger">Selection Details</h3>
                <div class="accordion-container" id="selection-details">
                    <div id="classSelectionInformation" class="hidden">
                        <p class="propDetails">Name: <span id="name"></span></p>
                        <p class="propDetails">Type: <span id="typeNode"></span></p>
                        <p class="propDetails">Equiv.: <span id="classEquivUri"></span></p>
                        <p class="propDetails">Disjoint: <span id="disjointNodes"></span></p>
                        <p class="propDetails">Charac.: <span id="classAttributes"></span></p>
                        <p class="propDetails">Individuals: <span id="individuals"></span></p>
                        <p class="propDetails">Description: <span id="nodeDescription"></span></p>
                        <p class="propDetails">Comment: <span id="nodeComment"></span></p>
                    </div>
                    <div id="propertySelectionInformation" class="hidden">
                        <p class="propDetails">Name: <span id="propname"></span></p>
                        <p class="propDetails">Type: <span id="typeProp"></span></p>
                        <p id="inverse" class="propDetails">Inverse: <span></span></p>
                        <p class="propDetails">Domain: <span id="domain"></span></p>
                        <p class="propDetails">Range: <span id="range"></span></p>
                        <p class="propDetails">Subprop.: <span id="subproperties"></span></p>
                        <p class="propDetails">Superprop.: <span id="superproperties"></span></p>
                        <p class="propDetails">Equiv.: <span id="propEquivUri"></span></p>
                        <p id="infoCardinality" class="propDetails">Cardinality: <span></span></p>
                        <p id="minCardinality" class="propDetails">Min. cardinality: <span></span></p>
                        <p id="maxCardinality" class="propDetails">Max. cardinality: <span></span></p>
                        <p class="propDetails">Charac.: <span id="propAttributes"></span></p>
                        <p class="propDetails">Description: <span id="propDescription"></span></p>
                        <p class="propDetails">Comment: <span id="propComment"></span></p>
                    </div>
                    <div id="noSelectionInformation">
                        <p><span>Select an element in the visualization.</span></p>
                    </div>
                </div>
            </section>
        </aside>
        <div id="blockGraphInteractions" class="hidden"></div>
        <div id="WarningErrorMessagesContainer" class="">
            <div id="WarningErrorMessages" class="">
            </div>
        </div>

        <div id="DirectInputContent" class="hidden">
            <div id="direct-text-input-container">
                <textarea rows="4" cols="25" title="Direct Text input as JSON(experimental)" class="directTextInputStyle" id="directInputTextArea"></textarea>
                <div id="di_controls">
                    <ul>
                        <li>
                            <button id="directUploadBtn">Upload</button>
                        </li>
                        <li>
                            <button id="close_directUploadBtn">Close</button>
                        </li>
                        <li id="Error_onLoad" class="hidden">Some text if ERROR</li>
                    </ul>
                </div>
            </div>


        </div>


    </main>
    <script src="js/d3.min.js"></script>
    <script src="js/webvowl.js"></script>
    <script src="js/webvowl.app.js"></script>
    <script>
        window.onload = webvowl.app().initialize;
    </script>
</body>

</html>