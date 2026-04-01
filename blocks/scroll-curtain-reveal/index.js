import { InnerBlocks, useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, ColorPalette } from '@wordpress/components';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType('nexora/scroll-curtain-reveal', {
    edit: ({ attributes, setAttributes }) => {
        const { columnCount, bgColor } = attributes;
        const blockProps = useBlockProps({
            className: `nexora-reveal nexora-reveal--col-${columnCount} is-animated`,
            style: { backgroundColor: bgColor }
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Reveal Settings">
                        <SelectControl
                            label="Choose Layout Mode"
                            value={columnCount}
                            options={[
                                { label: 'Single Column (Scale & Fade)', value: 1 },
                                { label: '2 Columns (Twin Curtains)', value: 2 },
                                { label: '3 Columns (Outer Curtains + Center Fade)', value: 3 },
                            ]}
                            onChange={(val) => setAttributes({ columnCount: parseInt(val) })}
                        />
                        <p>Background Color</p>
                        <ColorPalette
                            value={bgColor}
                            onChange={(val) => setAttributes({ bgColor: val })}
                        />
                    </PanelBody>
                </InspectorControls>
                <section {...blockProps}>
                    <div className="nexora-reveal__inner">
                        <InnerBlocks
                            orientation="horizontal"
                        />
                    </div>
                </section>
            </>
        );
    },
    save: () => <InnerBlocks.Content />
});
