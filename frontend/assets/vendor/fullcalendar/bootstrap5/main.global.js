/*!
FullCalendar v5.10.1
Docs & License: https://fullcalendar.io/
(c) 2021 Adam Shaw
*/
var FullCalendarBootstrap5 = (function (exports, common) {
    'use strict';

    /*! *****************************************************************************
    Copyright (c) Microsoft Corporation.

    Permission to use, copy, modify, and/or distribute this software for any
    purpose with or without fee is hereby granted.

    THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
    REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
    AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
    INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
    LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
    OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
    PERFORMANCE OF THIS SOFTWARE.
    ***************************************************************************** */
    /* global Reflect, Promise */

    var extendStatics = function(d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };

    function __extends(d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    }

    var BootstrapTheme = /** @class */ (function (_super) {
        __extends(BootstrapTheme, _super);
        function BootstrapTheme() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        return BootstrapTheme;
    }(common.Theme));
    BootstrapTheme.prototype.classes = {
        root: 'fc-theme-bootstrap5',
        tableCellShaded: 'fc-theme-bootstrap5-shaded',
        buttonGroup: 'btn-group',
        button: 'btn btn-primary',
        buttonActive: 'active',
        popover: 'popover',
        popoverHeader: 'popover-header',
        popoverContent: 'popover-body',
    };
    BootstrapTheme.prototype.baseIconClass = 'bi';
    BootstrapTheme.prototype.iconClasses = {
        close: 'bi-x-lg',
        prev: 'bi-chevron-left',
        next: 'bi-chevron-right',
        prevYear: 'bi-chevron-double-left',
        nextYear: 'bi-chevron-double-right',
    };
    BootstrapTheme.prototype.rtlIconClasses = {
        prev: 'bi-chevron-right',
        next: 'bi-chevron-left',
        prevYear: 'bi-chevron-double-right',
        nextYear: 'bi-chevron-double-left',
    };
    // wtf
    BootstrapTheme.prototype.iconOverrideOption = 'buttonIcons'; // TODO: make TS-friendly
    BootstrapTheme.prototype.iconOverrideCustomButtonOption = 'icon';
    BootstrapTheme.prototype.iconOverridePrefix = 'bi-';
    var plugin = common.createPlugin({
        themeClasses: {
            bootstrap5: BootstrapTheme,
        },
    });

    common.globalPlugins.push(plugin);

    exports.BootstrapTheme = BootstrapTheme;
    exports.default = plugin;

    Object.defineProperty(exports, '__esModule', { value: true });

    return exports;

}({}, FullCalendar));
