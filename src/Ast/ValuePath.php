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

class ValuePath extends Factor implements ComparablePath
{
    /** @var AttributePath */
    public $attributePath;

    /** @var Filter */
    public $filter;

    /** @var AttributePath|null */
    public $subAttributePath;

    /**
     * @param AttributePath      $attributePath
     * @param Filter             $filter
     * @param AttributePath|null $subAttributePath
     */
    public function __construct(AttributePath $attributePath, Filter $filter, ?AttributePath $subAttributePath = null)
    {
        $this->attributePath = $attributePath;
        $this->filter = $filter;
        $this->subAttributePath = $subAttributePath;
    }

    /**
     * @return AttributePath
     */
    public function getAttributePath()
    {
        return $this->attributePath;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return AttributePath|null
     */
    public function getSubAttributePath()
    {
        return $this->subAttributePath;
    }

    public function __toString()
    {
        $base = sprintf('%s[%s]', $this->attributePath, $this->filter);
        if ($this->subAttributePath !== null) {
            return sprintf('%s.%s', $base, $this->subAttributePath);
        }
        return $base;
    }

    public function dump()
    {
        $dump = [
            'ValuePath' => [
                $this->attributePath->dump(),
                $this->filter->dump(),
            ],
        ];

        if ($this->subAttributePath !== null) {
            $dump['ValuePath'][] = $this->subAttributePath->dump();
        }

        return $dump;
    }
}
