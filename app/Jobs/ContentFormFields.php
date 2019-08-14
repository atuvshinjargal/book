<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Content;

class ContentFormFields extends Job implements SelfHandling
{
     /**
   * The id (if any) of the Post row
   *
   * @var integer
   */
  protected $id;

  /**
   * List of fields and default value for each field
   *
   * @var array
   */
  protected $fieldList = [
    'name' => '',
    'video' => '',
    'text' => '',
    'week' => '',
    'homework' => '',
  ];

  /**
   * Create a new command instance.
   *
   * @param integer $id
   */
  public function __construct($id = null)
  {
    $this->id = $id;
  }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    $fields = $this->fieldList;

    if ($this->id) {
      $fields = $this->fieldsFromModel($this->id, $fields);
    }

    foreach ($fields as $fieldName => $fieldValue) {
      $fields[$fieldName] = old($fieldName, $fieldValue);
    }

    return $fields;
    }
    /**
   * Return the field values from the model
   *
   * @param integer $id
   * @param array $fields
   * @return array
   */
  protected function fieldsFromModel($id, array $fields)
  {
    $content = Content::findOrFail($id);
    return $content;
  }
}
