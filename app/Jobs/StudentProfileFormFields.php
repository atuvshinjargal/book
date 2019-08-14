<?php

namespace App\Jobs;

use App\Student;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class StudentProfileFormFields extends Job implements SelfHandling
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
    'code' => '',
    'firstname' => '',
    'lastname' => '',
    'work' => '',
    'graduate' => '',
    'degree' => '',
    'direction' => '',
    'schooling' => '',
    'user_id' => '',
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
   * Execute the command.
   *
   * @return array of fieldnames => values
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
    $student = Student::findOrFail($id);
    return $student;
  }
}
