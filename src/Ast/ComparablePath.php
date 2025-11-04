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

/**
 * Marker interface for paths that can be used in comparison expressions.
 */
interface ComparablePath
{
    /**
     * @return string
     */
    public function __toString();
}
