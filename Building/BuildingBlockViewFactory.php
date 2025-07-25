<?php

/**
 * Factory for creating block views.
 *
 * @copyright 2014-2016 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */
class BuildingBlockViewFactory
{
    /**
     * @param SiteApplication $app   the application in which to get the view
     * @param BuildingBlock   $block the block for which to get the view. The
     *                               block determines the view type that is
     *                               returned.
     *
     * @return BuildingBlockView a block view instance for displaying blocks
     *                           of the specified type
     *
     * @see SwatViewFactory::get()
     * @see BuildingBlockViewFactory::getViewType()
     */
    public static function getBlockView(
        SiteApplication $app,
        BuildingBlock $block
    ) {
        return SiteViewFactory::get($app, self::getViewType($block));
    }

    /**
     * Gets the view type for a block.
     *
     * @param BuildingBlock $block the block for which to get the view type
     *
     * @return string the view type for the block
     */
    public static function getViewType(BuildingBlock $block)
    {
        if ($block->media instanceof SiteAudioMedia) {
            return 'building-block-audio';
        }
        if ($block->media instanceof SiteVideoMedia) {
            return 'building-block-video';
        }
        if ($block->image instanceof SiteImage) {
            return 'building-block-image';
        }
        if ($block->attachment instanceof SiteAttachment) {
            return 'building-block-attachment';
        }

        return 'building-block-xhtml';
    }
}
