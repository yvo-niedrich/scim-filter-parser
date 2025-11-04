<?php

/*
 * This file is part of the tmilos/scim-filter-parser package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tmilos\ScimFilterParser\Ast;

class ComparisonExpression extends Factor
{
    /** @var ComparablePath */
    public $attributePath;

    /** @var string */
    public $operator;

    /** @var mixed */
    public $compareValue;

    /**
     * @param ComparablePath $attributePath
     * @param string         $operator
     * @param mixed          $compareValue
     */
    public function __construct(ComparablePath $attributePath, $operator, $compareValue = null)
    {
        $this->attributePath = $attributePath;
        $this->operator = $operator;
        $this->compareValue = $compareValue;
    }

    /**
     * @return mixed
     */
    private function getCompareValueToString()
    {
        return $this->compareValue instanceof \DateTime ? $this->compareValue->format('Y-m-d\TH:i:s\Z') : $this->compareValue;
    }

    public function __toString()
    {
        return $this->operator === 'pr'
            ? sprintf('%s %s', $this->attributePath, $this->operator)
            : sprintf('%s %s %s', $this->attributePath, $this->operator, $this->getCompareValueToString());
    }

    public function dump()
    {
        return [
            'ComparisonExpression' => (string) $this,
        ];
    }
}
