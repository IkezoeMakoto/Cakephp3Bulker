<?php

namespace Cakephp3Bulker\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bulker behavior
 */
class BulkerBehavior extends Behavior
{
    public function __construct(Table $table, array $config = [])
    {
        parent::__construct($table, $config);
    }

    /**
     * bulk insert
     * @param array $saveData
     * @param array $options
     *
     * @return int|bool int: count save rows, bool: It is false when saving fails
     */
    public function saveBulk(array $saveDataList, array $options = [])
    {
        // Validate logic
        $isValidateError = false;
        $checkEntities = $this->_table->newEntities($saveDataList);
        foreach ($checkEntities as $checkEntity) {
            $isValidateError = !empty($checkEntity->errors());
            if ($isValidateError) {
                return false;
            }
        }

        // Bulk insert logic
        $firstValues = current($saveDataList);
        if (!is_array($firstValues)) {
            throw new \InvalidArgumentException('$saveDataList is required a two-dimensional array.');
        }

        $fields = array_keys($firstValues);

        // Get Query Objects
        $query = $this->_table->query();

        // Set Fields
        $query->insert($fields);
        // Set Values
        $query->clause('values')->values($saveDataList);


        // ON DUPLICATE KEY UPDATE logic
        $updateKey = [];
        foreach ($fields as $field) {
            $updateKey[] = $field . ' = VALUES(' . $field . ')';
        }
        $updateKeyStr = 'ON DUPLICATE KEY UPDATE ' . implode(', ', $updateKey);
        // Set ON DUPLICATE KEY UPDATE
        $query->epilog($updateKeyStr);

        return $query->execute()->rowCount();
    }
}
