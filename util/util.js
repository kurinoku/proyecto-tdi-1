
function conjoin(fs) {
    "use strict";
    return function(x) {
        return fs.reduce(function(prev, cur) { return prev && cur(x); }, true);
    };
}

function disjoin(fs) {
    "use strict";
    return function(x) {
        return fs.reduce(function(prev, cur) { return prev || cur(x); }, false);
    };
}