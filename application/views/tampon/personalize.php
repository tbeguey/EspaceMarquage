<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<body>
<div class="container body-content">

    <h4 id="title">TAMPON <?php echo $title ?></h4>

    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div id="pads" style="width: <?php echo $width ?>; height: <?php echo $height ?>">
            <div id="pad"></div>
            <div id="border_one" class="invisible"></div>
            <div id="border_two" class="invisible"></div>
        </div>
        <div style="display:inline-grid; margin: 0 10px 10px;">
            <a onclick="zoom_in_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_in</i></a>
            <span id="zoom_value">100%</span>
            <a onclick="zoom_out_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_out</i></a>
        </div>
    </div>

    <div class="row" style="background-color:white; margin-top:10px;">
        <div class="col s12">
            <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col s3"><a class="swipe-text" href="#test-swipe-1">Texte entier</a></li>
                <li class="tab col s3"><a class="swipe-text" href="#test-swipe-2">Ligne par ligne</a></li>
                <li class="tab col s3"><a class="swipe-text" href="#test-swipe-3">Images / Logos</a></li>
                <li class="tab col s3"><a class="swipe-text" href="#test-swipe-4">Cadre / Bordures</a></li>
            </ul>
            <div id="test-swipe-1" class="col s12">
                <br />
                <div class="row">
                    <div class="col s12" style="text-align:center">
                        <a class="btn waves-effect waves-light" id="left_align_button" onclick="left_align()"><i class="material-icons left">format_align_left</i>ALIGNER A GAUCHE</a>
                        <a class="btn waves-effect waves-light active_button" id="center_align_button" onclick="center_align()"><i class="material-icons left">format_align_center</i>CENTRER</a>
                        <a class="btn waves-effect waves-light" id="right_align_button" onclick="right_align()"><i class="material-icons right">format_align_right</i>ALIGNER A DROITE</a>
                    </div>
                </div>
                <br />
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="col s4">
                                <label for="list_color">Couleur de texte</label>
                                <select id="list_color">
                                    <option value="black">Noir</option>
                                    <option value="blue">Bleu</option>
                                    <option value="red">Rouge</option>
                                    <option value="green">Vert</option>
                                    <option value="purple">Violet</option>
                                </select>
                            </div>
                            <div class="col s4">
                                <label for="font_size_list">Taille de texte</label>
                                <select onchange="change_font_size()" id="font_size_list">
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10" selected="selected">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col s4">
                                <label for="font_family_list">Police de texte</label>
                                <select onchange="change_font_family()" id="font_family_list" style="height:20px; overflow:scroll">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <br />
            </div>
            <div id="test-swipe-2" class="col s12">
                <br />
                <div id="lines">
                </div>
                <br />
                <div class="row">
                    <div class="col s6 col offset-s4" style="padding:0">
                        <a class="waves-effect waves-light btn" onclick="addrow()" id="add-row"><i class="material-icons left">add</i>AJOUTER UNE LIGNE</a>
                    </div>
                </div>
                <br />
            </div>

            <div id="test-swipe-3" class="col s12">
                <br />
                <div class="switch col offset-l4">
                    <label for="switch_logo">
                        Notre bibliothèque
                        <input type="checkbox" id="switch_logo">
                        <span class="lever"></span>
                        Vos téléchargements
                    </label>
                </div>
                <br />
                <div id="logo-buttons" class="undisplay">
                    <a class="waves-effect waves-light btn" onclick="img_size_plus()"><i class="material-icons">zoom_in</i></a>
                    <a class="waves-effect waves-light btn" onclick="img_size_minus()"><i class="material-icons">zoom_out</i></a>
                    <a class="waves-effect waves-light btn red" id="rmv-btn" onclick="remove_image_pad()"><i class="material-icons">highlight_off</i></a>
                    <br />
                    <div class="row" style="margin: 3px 3px 3px 40px;">
                        <a class="waves-effect waves-light btn" onclick="img_move_top()"><i class="material-icons">keyboard_arrow_up</i></a>
                    </div>
                    <div class="row" style="margin: 3px;">
                        <a class="waves-effect waves-light btn" onclick="img_move_left()"><i class="material-icons">keyboard_arrow_left</i></a>
                        <a class="waves-effect waves-light btn" onclick="img_move_right()"><i class="material-icons">keyboard_arrow_right</i></a>
                    </div>
                    <div class="row" style="margin: 3px 3px 3px 40px;">
                        <a class="waves-effect waves-light btn" onclick="img_move_down()"><i class="material-icons">keyboard_arrow_down</i></a>
                    </div>
                </div>
                <div id="library-logo-div">
                    <div class="row" style="margin-top:10px;">
                        <div class="col s3">
                            <label for="categories-list">Categorie</label>
                            <select id="categories-list">
                                    <option value="">Tout</option>
                                </select>
                        </div>
                        <div class="col s6 offset-s3">
                            <label for="logo-search"><i class="material-icons">search</i></label>
                            <input type="text" id="logo-search" placeholder="Rechercher"/>
                        </div>
                    </div>
                    <ul class="logo-list" id="logo-list-library">
                    </ul>
                    <br/>
                </div>
                <div id="upload-logo-div" class="undisplay">
                    <div class="jumbotron">
                        <form action="<?php echo base_url(); ?>tampon/save_upload_file/" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneForm">
                            <div class="dz-message" data-dz-message><span>Glissez/Déposez votre image ici ou cliquez pour ouvrir l'explorateur de fichiers.</span></div>
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                    <br />
                    <ul class="logo-list" id="logo-list-upload">
                    </ul>
                </div>
            </div>
            <div id="test-swipe-4" class="col s12">
                <br/>
                <div class="row">
                    <div class="col s4 col offset-s1 border-rect">
                        <p class="border-title">Bordure</p>
                        <div class="switch">
                            <label>
                                Off
                                <input type="checkbox" id="switch_border_one">
                                <span class="lever"></span>
                                On
                            </label>
                        </div>
                        <br/>
                        <div id="options-border-1" class="invisible">
                            <div>
                                <label for="border_style_one">Style de bordure : </label>
                                <select class="border_style" id="border_style_one">
                                    <option value="solid">Normal</option>
                                    <option value="dashed">Pointillé</option>
                                    <option value="double">Double</option>
                                </select>
                            </div>
                            <div style="display:inline-flex">
                                <label> Largeur 1
                                    <input type="range" min="2" max="100" value="2" step="1" id="width_border_one" class="width_border"/>
                                </label>
                                <label id="label_width_border_two" class="invisible"> Largeur 2 (Double uniquement)
                                    <input type="range" min="10" max="100" value="10" step="1" id="width_border_two" class="width_border invisible"/>
                                </label>
                            </div>
                            <div style="display:inline-flex">
                                <label> Hauteur 1
                                    <input type="range" min="5" max="100" value="5" step="1" id="height_border_one" class="height_border"/>
                                </label>
                                <label id="label_height_border_two" class="invisible"> Hauteur 2 (Double uniquement)
                                    <input type="range" min="15" max="100" value="15" step="1" id="height_border_two" class="height_border invisible"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="date-border" class="col s4 col offset-s1 border-rect invisible">
                        <p class="border-title">Bordure de date</p>
                        <div class="switch">
                            <label>
                                Off
                                <input type="checkbox" onchange="active_border_date()">
                                <span class="lever"></span>
                                On
                            </label>
                        </div>
                        <div id="options-border-d" class="invisible">
                            <div>
                                <label for="border_style_date">Style de bordure : </label>
                                <select class="border_style" id="border_style_date">
                                    <option value="solid">Normal</option>
                                    <option value="dashed">Pointillé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </div>
    <br />
    <div style="background-color:white;">
        <!--<div class="row">
            <div class="col s12" style="text-align:center">
                <input type="checkbox" id="alone_checkbox" onchange="alone_function()"/>
                <label for="alone_checkbox">Empreinte seule ?</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12" style="text-align: center" id="pad-colors">
                <label>Préférence de couleur du boitier (Facultatif) : </label>
                <a class="btn waves-effect waves-light pad-color-button red"><i class="material-icons">check</i></a>
                <a class="btn waves-effect waves-light pad-color-button green"><i class="material-icons">check</i></a>
                <a class="btn waves-effect waves-light pad-color-button blue"><i class="material-icons">check</i></a>
                <a class="btn waves-effect waves-light pad-color-button purple"><i class="material-icons">check</i></a>
                <a class="btn waves-effect waves-light pad-color-button orange"><i class="material-icons">check</i></a>
                <a class="btn waves-effect waves-light pad-color-button black"><i class="material-icons">check</i></a>
            </div>
        </div>
        <br />-->
        <div class="row">
            <div class="col s3">
                <img src="<?php echo base_url('images/logo-pdf.png');?>" style="width:50px; height:50px" />
                <a href="javascript:export_pdf()">Télécharger le visuel en PDF</a>
            </div>

            <div class="col s6 col offset-s2" style="text-align:right">
                <label>Quantité : </label>
                <input id="input_quantity" type="number" min="1" max="9" step="1" value="1" style="font: 24pt Courier; width: 50px; height: 50px; text-align:center; margin-right:15px;">
                <a class="waves-effect waves-light btn modal-trigger" href="#mail-modal"><i class="material-icons left">shopping_cart</i>ENVOYER COMMANDE</a>
            </div>
            <div class="col s6 col offset-s6" style="text-align:center">
            </div>
        </div>
    </div>
    <br />
</div>
</body>

<div id="mail-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Envoi de commande</h4>
        <label for="modal-object">Objet : </label> <input type="text" id="modal-object" value="ESPACE MARQUAGE - COMMANDE XXXXXXXX [<?php echo $this->ion_auth->user()->row()->username ?>]"/>
        <br/>
        <textarea cols="50" rows="6" name="text-mail" id="Commentaires">Vous pouvez écrire votre texte ici.</textarea>
        <script type="text/JavaScript">CKEDITOR.replace('Commentaires');</script>
    </div>

    <div class="modal-footer">
        <a onclick="order()" class="modal-action modal-close waves-effect waves-green btn">ENVOYER</a>
    </div>
</div>

<div id="buy-encre-modal" class="modal">
    <div class="modal-content">
        <p style="text-align: center;">Voulez-vous commander des recharges d'encres associées à ce tampon ?</p>
        <div class="row">
            <div class="col s2 offset-s4">
                <a class="waves-effect waves-light btn" href="<?php echo base_url('encre/' . $id_pad);?>">OUI</a>
            </div>
            <div class="col s2 offset-s1">
                <a class="waves-effect waves-light btn modal-close">NON</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let width_mm = <?php echo $width_mm ?>;
    let height_mm = <?php echo $height_mm ?>;
    let max_lines = <?php echo $max_lines ?>;
    let dateur = <?php echo $dater ?>;
    let circle = <?php echo $circle ?>;
    let id_pad = <?php echo $id_pad ?>;
    let name_pad = "<?php echo $title; ?>";



</script>

