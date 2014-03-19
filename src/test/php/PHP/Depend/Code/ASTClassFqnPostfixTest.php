<?php
/**
 * This file is part of PHP_Depend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2013, Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

require_once dirname(__FILE__) . '/ASTNodeTest.php';

/**
 * Test case for the {@link \PDepend\Source\AST\ASTPropertyPostfix} class.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
class PHP_Depend_Code_ASTClassFqnPostfixTest extends PHP_Depend_Code_ASTNodeTest
{
    /**
     * testGetImage
     * 
     * @return void
     */
    public function testGetImage()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass();
        $this->assertEquals('class', $postfix->getImage());
    }

    /**
     * testClassFqnPostfixStructureWithStatic
     *
     * @return void
     */
    public function testClassFqnPostfixStructureWithStatic()
    {
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTStaticReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testGetImageWorksCaseInsensitive
     *
     * @return void
     */
    public function testGetImageWorksCaseInsensitive()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass();
        $this->assertEquals('class', $postfix->getImage());
    }

    /**
     * testClassFqnPostfixStructureWithSelf
     *
     * @return void
     */
    public function testClassFqnPostfixStructureWithSelf()
    {
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTSelfReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixStructureWithParent
     *
     * @return void
     */
    public function testClassFqnPostfixStructureWithParent()
    {
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTParentReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixStructureWithClassName
     *
     * @return void
     */
    public function testClassFqnPostfixStructureWithClassName()
    {
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTClassOrInterfaceReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixStructureAsPropertyInitializer
     *
     * <code>
     * protected $foo = \Iterator::class;
     * </code>
     *
     * @return void
     */
    public function testClassFqnPostfixAsPropertyInitializer()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTClassOrInterfaceReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixStructureAsPropertyInitializerWithSelf
     *
     * <code>
     * protected $foo = self::class;
     * </code>
     *
     * @return void
     */
    public function testClassFqnPostfixAsPropertyInitializerWithSelf()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTSelfReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixAsParameterInitializer
     *
     * @return void
     */
    public function testClassFqnPostfixAsParameterInitializer()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTClassOrInterfaceReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixAsParameterInitializerWithSelf
     *
     * @return void
     */
    public function testClassFqnPostfixAsParameterInitializerWithSelf()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTSelfReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixAsConstantInitializer
     *
     * @return void
     */
    public function testClassFqnPostfixAsConstantInitializer()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTClassOrInterfaceReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixAsConstantInitializerWithSelf
     *
     * @return void
     */
    public function testClassFqnPostfixAsConstantInitializerWithSelf()
    {
        $this->assertNotNull($this->parseCodeResourceForTest());

        $this->markTestIncomplete('We do not handle default values.');
        $this->assertGraphEquals(
            $this->_getFirstMemberPrimaryPrefixInClass(__METHOD__),
            array(
                PHP_Depend_Code_ASTSelfReference::CLAZZ,
                PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
            )
        );
    }

    /**
     * testClassFqnPostfixHasExpectedStartLine
     *
     * @return void
     */
    public function testClassFqnPostfixHasExpectedStartLine()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass(__METHOD__);
        $this->assertEquals(6, $postfix->getStartLine());
    }

    /**
     * testClassFqnPostfixHasExpectedStartColumn
     *
     * @return void
     */
    public function testClassFqnPostfixHasExpectedStartColumn()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass(__METHOD__);
        $this->assertEquals(26, $postfix->getStartColumn());
    }

    /**
     * testClassFqnPostfixHasExpectedEndLine
     *
     * @return void
     */
    public function testClassFqnPostfixHasExpectedEndLine()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass(__METHOD__);
        $this->assertEquals(6, $postfix->getEndLine());
    }

    /**
     * testClassFqnPostfixHasExpectedEndColumn
     *
     * @return void
     */
    public function testClassFqnPostfixHasExpectedEndColumn()
    {
        $postfix = $this->_getFirstClassFqnPostfixInClass(__METHOD__);
        $this->assertEquals(63, $postfix->getEndColumn());
    }

    /**
     * Creates a field declaration node.
     *
     * @return \PDepend\Source\AST\ASTClassFqnPostfix
     */
    protected function createNodeInstance()
    {
        return new PHP_Depend_Code_ASTClassFqnPostfix(__CLASS__);
    }

    /**
     * Returns a node instance for the currently executed test case.
     *
     * @return \PDepend\Source\AST\ASTClassFqnPostfix
     */
    private function _getFirstClassFqnPostfixInClass()
    {
        return $this->getFirstNodeOfTypeInClass(
            $this->getCallingTestMethod(),
            PHP_Depend_Code_ASTClassFqnPostfix::CLAZZ
        );
    }
    /**
     * Returns a node instance for the currently executed test case.
     *
     * @param string $testCase Name of the calling test case.
     *
     * @return \PDepend\Source\AST\ASTMemberPrimaryPrefix
     */
    private function _getFirstMemberPrimaryPrefixInClass($testCase)
    {
        return $this->getFirstNodeOfTypeInClass(
            $testCase,
            PHP_Depend_Code_ASTMemberPrimaryPrefix::CLAZZ
        );
    }
}
