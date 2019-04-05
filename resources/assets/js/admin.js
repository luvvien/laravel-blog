require('./bootstrap');

require("inline-attachment/src/inline-attachment.js");

require("inline-attachment/src/codemirror-4.inline-attachment.js");

window.markdown_editor = function () {
    window.SimpleMDE = require('simplemde');
    // Most options demonstrate the non-default behavior
    var unique_id = $('#slug').val() ? $('#slug').val() : 'markdown';
    var markdown = new SimpleMDE({
        autofocus: true,
        autosave: {
            enabled: true,
            uniqueId: unique_id,
            delay: 1000
        },
        element: document.getElementById("markdown"),
        insertTexts: {
            horizontalRule: ["", "\n\n-----\n\n"],
            image: ["![](https://", ")"],
            link: ["[", "](https://)"],
            table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
        },
        placeholder: "Type here...",
        spellChecker: false,
        renderingConfig: {
            codeSyntaxHighlighting: true
        },
        showIcons: ["code", "horizontal-rule", "table", "strikethrough", "heading-1", "heading-2", "heading-3"],
        toolbar: [

            {
                name: "bold",
                action: SimpleMDE.toggleBold,
                className: "fa fa-bold",
                title: "Bold"
            },

            {
                name: "bold",
                action: SimpleMDE.toggleItalic,
                className: "fa fa-italic",
                title: "Italic"
            },

            {
                name: "strikethrough",
                action: SimpleMDE.toggleStrikethrough,
                className: "fa fa-strikethrough",
                title: "Strikethrough"
            },

            '|',

            {
                name: "heading",
                action: SimpleMDE.toggleHeadingSmaller,
                className: "fa fa-header",
                title: "Heading"
            },

            {
                name: "heading-1",
                action: SimpleMDE.toggleHeading1,
                className: "fa fa-header fa-header-x fa-header-1",
                title: "H1"
            },

            {
                name: "heading-2",
                action: SimpleMDE.toggleHeading2,
                className: "fa fa-header fa-header-x fa-header-2",
                title: "H2"
            },

            {
                name: "heading-3",
                action: SimpleMDE.toggleHeading1,
                className: "fa fa-header fa-header-x fa-header-3",
                title: "H3"
            },

            '|',

            {
                name: "code",
                action: SimpleMDE.toggleCodeBlock,
                className: "fa fa-code",
                title: "Code"
            },

            {
                name: "quote",
                action: SimpleMDE.toggleBlockquote,
                className: "fa fa-quote-left",
                title: "Quote"
            },

            {
                name: "unordered-list",
                action: SimpleMDE.toggleUnorderedList,
                className: "fa fa-list-ul",
                title: "Generic List"
            },

            {
                name: "ordered-list",
                action: SimpleMDE.toggleOrderedList,
                className: "fa fa-list-ol",
                title: "Numbered List"
            },

            {
                name: "horizontal-rule",
                action: SimpleMDE.drawHorizontalRule,
                className: "fa fa-minus",
                title: "Insert Horizontal Line"
            },

            '|',

            {
                name: "link",
                action: SimpleMDE.drawLink,
                className: "fa fa-link",
                title: "Create Link"
            },

            {
                name: "image",
                action: SimpleMDE.drawImage,
                className: "fa fa-picture-o",
                title: "Insert Image"
            },

            {
                name: "table",
                action: SimpleMDE.drawTable,
                className: "fa fa-table",
                title: "Insert Table"
            },

            '|',

            {
                name: "preview",
                action: SimpleMDE.togglePreview,
                className: "fa fa-eye no-disable",
                title: "Toggle Preview"
            },

            {
                name: "side-by-side",
                action: SimpleMDE.toggleSideBySide,
                className: "fa fa-columns no-disable no-mobile",
                title: "Toggle Side by Side"
            },

            {
                name: "fullscreen",
                action: SimpleMDE.toggleFullScreen,
                className: "fa fa-arrows-alt no-disable no-mobile",
                title: "Toggle Fullscreen"
            },

            {
                name: "guide",
                action: function customFunction(editor) {
                    window.open("https://vienblog.com/markdown-yu-fa")
                },
                className: "fa fa-question-circle",
                title: "Help"
            }
        ]
    });

    markdown.codemirror.on("change", function () {
        var html = markdown.value();
        $('input[name="markdown"]').val(html);
    });

    var inlineAttachmentConfig = {
        uploadUrl: '/admin/upload/image/article',
        extraHeaders: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    };

    inlineAttachment.editors.codemirror4.attach(markdown.codemirror,
        inlineAttachmentConfig);
}

