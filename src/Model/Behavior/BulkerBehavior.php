<?php

namespace Cakephp3Bulker\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * Bulker behavior
 */
class BulkerBehavior extends Behavior
{
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
