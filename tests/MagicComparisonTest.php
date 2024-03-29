<?php
/**
 * Contains the MagicComparisonTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-12
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\ConstsWithUnderscores;
use Konekt\Enum\Tests\Fixture\NullableEnum;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use Konekt\Enum\Tests\Fixture\SampleWithNumericConstName;
use PHPUnit\Framework\TestCase;

class MagicComparisonTest extends TestCase
{
    /**
     * @test
     */
    public function equality_can_be_checked_via_magic_property()
    {
        $two = SampleOneTwoThree::TWO();

        $this->assertTrue($two->is_two);
        $this->assertFalse($two->is_one);
        $this->assertFalse($two->is_three);
    }

    /**
     * @test
     */
    public function checking_equality_via_property_against_nonexistent_const_throws_a_notice()
    {
        $this->expectNotice();

        $three = SampleOneTwoThree::THREE();
        $three->is_four;
    }

    /**
     * @test
     */
    public function equality_check_via_magic_property_works_on_nullable_enums()
    {
        $unknown   = NullableEnum::create();
        $completed = NullableEnum::COMPLETED();

        $this->assertTrue($unknown->is_unknown);
        $this->assertFalse($unknown->is_completed);

        $this->assertTrue($completed->is_completed);
        $this->assertFalse($completed->is_unknown);
    }

    /**
     * @test
     */
    public function equality_can_be_checked_with_magic_method()
    {
        $one = SampleOneTwoThree::ONE();

        $this->assertTrue($one->isOne());
        $this->assertFalse($one->isTwo());
        $this->assertFalse($one->isThree());
    }

    /**
     * @test
     */
    public function checking_equality_with_method_against_nonexistent_const_throws_a_warning()
    {
        $this->expectWarning();

        $two = SampleOneTwoThree::TWO();
        $two->isFour();
    }

    /**
     * @test
     */
    public function equality_magic_method_requires_first_letter_to_be_uppercase_after_is()
    {
        $this->expectWarning();

        $two = SampleOneTwoThree::TWO();
        $two->istwo();
    }

    /**
     * @test
     */
    public function equality_check_with_magic_method_works_on_nullable_enums()
    {
        $unknown   = NullableEnum::create();
        $completed = NullableEnum::COMPLETED();

        $this->assertTrue($unknown->isUnknown());
        $this->assertFalse($unknown->isCompleted());

        $this->assertTrue($completed->isCompleted());
        $this->assertFalse($completed->isUnknown());
    }

    /**
     * @test
     */
    public function underscores_in_const_names_are_resolved_properly()
    {
        $wentFishing = ConstsWithUnderscores::WENT_FISHING();
        $atHome      = ConstsWithUnderscores::AT_HOME();

        $this->assertTrue($wentFishing->is_went_fishing);
        $this->assertTrue($wentFishing->isWentFishing());
        $this->assertFalse($wentFishing->is_at_home);
        $this->assertFalse($wentFishing->isAtHome());

        $this->assertTrue($atHome->is_at_home);
        $this->assertTrue($atHome->isAtHome());
        $this->assertFalse($atHome->is_went_fishing);
        $this->assertFalse($atHome->isWentFishing());
    }

    /** @test */
    public function numerical_parts_at_const_name_endings_are_treated_properly()
    {
        $schalke = SampleWithNumericConstName::SCHALKE_04();

        $this->assertTrue($schalke->isSchalke04());
        $this->assertTrue($schalke->is_schalke_04);
    }

    /** @test */
    public function numerical_parts_inside_const_name_endings_are_treated_properly()
    {
        $hoffenheim = SampleWithNumericConstName::FC_1899_HOFFENHEIM();

        $this->assertTrue($hoffenheim->isFc1899Hoffenheim());
        $this->assertTrue($hoffenheim->is_fc_1899_hoffenheim);
    }
}
