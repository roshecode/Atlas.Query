<?php
/**
 *
 * This file is part of Atlas for PHP.
 *
 * @license http://opensource.org/licenses/mit-license.php MIT
 *
 */
declare(strict_types=1);

namespace Atlas\Query\Clause\Component;

use Atlas\Query\Bind;

abstract class ModifyColumns extends Component
{
    protected $bind;

    protected $list = [];

    public function __construct(Bind $bind)
    {
        $this->bind = $bind;
    }

    public function hasAny() : bool
    {
        return ! empty($this->list);
    }

    public function hold(string $column, ...$value) : void
    {
        $this->list[$column] = ":{$column}";
        if (! empty($value)) {
            $this->bind->value($column, ...$value);
        }
    }

    public function raw(string $column, $value) : void
    {
        if ($value === null) {
            $value = 'NULL';
        }
        $this->list[$column] = $value;
        $this->bind->remove($column);
    }
}
