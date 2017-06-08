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
     * @return int
     */
    public function saveBulk(array $saveDataList, array $options = [])
    {
        // TODO: validate logicta

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


        // TODO: ON DUPLICATE KEY UPDATE logic
        $updateKey = [];
        foreach ($fields as $field) {
            $updateKey[] = $field . ' = (' . $field . ')';
        }
        $updateKeyStr = 'ON DUPLICATE KEY UPDATE ' . implode(', ', $updateKey);
        // Set ON DUPLICATE KEY UPDATE
        $query->epilog($updateKeyStr);

        return $query->execute()->rowCount();
    }
}
