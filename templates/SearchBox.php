<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" id="searchform1" accept-charset="utf-8" method="get">
<div class="modal fade" id="AdvancedSearch" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold;" id="MessageTitle">Advanced Search</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: red;" title="Close">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <br />
                <div style="text-align: left;" id="MessageText">
                    <div id="search-op">
                       <fieldset class="fieldset">
                          <h5><b><?=t("Search operator"); ?>:</b></h5>
                          <div><?=t("Find:") ?></div>
                          <div>
                            <input type="radio"
                                   name="operator" <?=($operator == 'OR') ? 'checked' : '' ?>
                                   value="OR"> <?=t("At least one word (OR)") ?>
                          </div>
                          <div>
                            <input type="radio"
                                   name="operator" <?=($operator == 'AND') ? 'checked' : '' ?>
                                   value="AND"> <?=t("All words (AND)") ?>
                          </div>
                          <div>
                            <input type="radio"
                                   name="operator" <?=($operator == 'Phrase') ? 'checked' : '' ?>
                                   value="Phrase"> <?=t("Exact expression (Phrase)") ?>
                          </div>
                        </fieldset>
                    </div>
                    <br />
                    <div>
                        <fieldset>
                          <h5><b><?=t('Semantic search &amp; fuzzy search:') ?></b></h5>
                          <div>
                            Also find:
                          </div>
                          <div>
                            <input type="checkbox" name="stemming" id="stemming"
                                   value="stemming" <?=($stemming == true) ? 'checked' : '' ?>>
                            <label
                              for="stemming"><?=t('Other word forms (grammar &amp; stemming)') ?></label>
                          </div>
                          <div>
                            <input type="checkbox" name="synonyms" id="synonyms"
                                   value="synonyms" <?=($synonyms == true) ? 'checked' : '' ?> >
                            <label for="synonyms"><?=t('Synonyms & aliases') ?></label>
                          </div>
                        </fieldset>
                    </div>
                </div>
                <br />
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block text-uppercase" style="width: 100px; margin: 10px;" data-dismiss="modal">Ok</button>
            </div>

        </div>
    </div>
</div>
<?php echo $form_hidden_parameters ?>
<div class="input-group" style="border:solid 1px #4e73df; border-radius:5px;">
  <input type="text" class="form-control bg-light border-0 big" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="q" name="q" type="text"
   value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'utf-8'); ?>" required=""  oninvalid="this.setCustomValidity('The search query is empty!')" oninput="setCustomValidity('')"/>
  <div class="input-group-append">
    <button class="btn btn-primary" type="button" value="<?=t("Search"); ?>" onclick="AdvancedSearch()" style="border:solid 1px ;">
      <i class="fas fa-filter"></i>
    </button>
    <button class="btn btn-primary" id="submit" type="submit" value="<?=t("Search"); ?>" onclick='waiting_on();' style="border:solid 1px ;">
      <i class="fas fa-search fa-sm"></i>
    </button>

  </div>
</div>
</form>
