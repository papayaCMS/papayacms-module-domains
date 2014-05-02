<?php

class PapayaModuleDomainsAdministrationGroupDelete
  extends PapayaUiControlCommandDialogDatabaseRecord {

  public function createDialog() {
    /** @var PapayaContentDomainGroup $record */
    $record = $this->record();
    if ($record->isLoaded()) {
      $dialog = parent::createDialog();
      $dialog->parameterGroup('domain_group');
      $dialog->caption = new PapayaUiStringTranslated('Domain group');
      $dialog->hiddenValues->merge(
        array(
          $this->parameterGroup() => array(
            'cmd' => 'group_delete',
            'group_id' => (int)$record->id,
            'domain_id' => 0
          )
        )
      );
      $dialog->hiddenFields->merge(
        array(
          'group_id' => $record->id
        )
      );
      $dialog->fields[] = new PapayaUiDialogFieldInformation(
        new PapayaUiStringTranslated(
          'Delete domain group "%s" #%d?', array($record->title, $record->id)
        ),
        'places-trash'
      );
      $dialog->buttons[] = new PapayaUiDialogButtonSubmit(
        new PapayaUiStringTranslated('Delete')
      );
      return $dialog;
    }
    return NULL;
  }
}