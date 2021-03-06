<?php
/**
 *
 * This file is part of Atlas for PHP.
 *
 * @license http://opensource.org/licenses/mit-license.php MIT
 *
 */
declare(strict_types=1);

namespace Atlas\Query\Clause;

trait Where
{
    protected $where;

    public function where(string $condition, ...$inline)
    {
        $this->where->and($condition, ...$inline);
        return $this;
    }

    public function andWhere(string $condition, ...$inline)
    {
        $this->where->and($condition, ...$inline);
        return $this;
    }

    public function orWhere(string $condition, ...$inline)
    {
        $this->where->or($condition, ...$inline);
        return $this;
    }

    public function catWhere(string $condition, ...$inline)
    {
        $this->where->cat($condition, ...$inline);
        return $this;
    }

    public function resetWhere()
    {
        $this->where = new Component\Conditions($this->bind, 'WHERE');
        return $this;
    }
}
