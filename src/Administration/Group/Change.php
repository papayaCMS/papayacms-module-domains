<?php

class PapayaModuleDomainsAdministrationGroupChange
  extends PapayaUiControlCommandDialogDatabaseRecord {

  public function createDialog() {
    /** @var PapayaContentDomainGroup $record */
    $record = $this->record();
    $dialog = parent::createDialog();
    $dialog->parameterGroup('domain_group');
    $dialog->caption = new PapayaUiStringTranslated('Domain group');
    $dialog->hiddenValues->merge(
      array(
        $this->parameterGroup() => array(
          'cmd' => 'group_edit',
          'group_id' => (int)$record->id,
          'domain_id' => 0
        )
      )
    );
    if ($record->isLoaded()) {
      $dialog->hiddenFields->merge(
        array(
          'group_id' => $record->id
        )
      );
    }
    $dialog->fields[] = new PapayaUiDialogFieldInput(
      'Title', 'title', 100, '', new PapayaFilterNotEmpty()
    );
    $dialog->buttons[] = new PapayaUiDialogButtonSubmit(
      new PapayaUiStringTranslated('Save')
    );
    return $dialog;
  }
}