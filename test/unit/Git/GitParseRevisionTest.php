<?php

declare(strict_types=1);

namespace RoaveTest\ApiCompare\Git;

use PHPUnit\Framework\TestCase;
use Roave\ApiCompare\Git\CheckedOutRepository;
use Roave\ApiCompare\Git\GitParseRevision;

/**
 * @covers \Roave\ApiCompare\Git\GitParseRevision
 */
final class GitParseRevisionTest extends TestCase
{
    public function revisionProvider() : array
    {
        return [
            ['e72a47b', 'e72a47bb9d777c9e73c1322d58a83450d36d9454'],
        ];
    }

    /**
     * @dataProvider revisionProvider
     */
    public function testFromStringForRepository(string $revisionToBeParsed, string $expectedRevision) : void
    {
        self::assertSame(
            $expectedRevision,
            (new GitParseRevision())->fromStringForRepository(
                $revisionToBeParsed,
                CheckedOutRepository::fromPath(__DIR__ . '/../../../')
            )->__toString()
        );
    }
}
