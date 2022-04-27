/*!
FullCalendar v5.10.1
Docs & License: https://fullcalendar.io/
(c) 2021 Adam Shaw
*/
'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

var tslib = require('tslib');
var common = require('@fullcalendar/common');
;

var BootstrapTheme = /** @class */ (function (_super) {
    tslib.__extends(BootstrapTheme, _super);
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

exports.BootstrapTheme = BootstrapTheme;
exports.default = plugin;
