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
     *
     * @param array $saveData
     * @param array $options
     *
     * @return array|bool
     */
    public function saveBulk(array $saveData, array $options = [])
    {
        // TODO: validate logic

        // TODO: bulk insert logic
    }
}
