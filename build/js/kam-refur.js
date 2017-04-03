(function($) {
    'use strict';

    var model = {
        headlines: [],
    }

    var postHeadlineController = {
        addPostToHeadline: function(post) {
            model.headlines.push(post);
        },

        displayPostsHeadline: function() {
            postHeadlineView.init(model.headlines);
        },

    }

    var postHeadlineView = {
        init: function(content) {
            var container = $('.headlines');
            (content || []).map(function(post) {
                container.prepend(`<div class="headline-tile">${post.title.rendered}</div>`);
            });
            //this.animateHeadline();
        },

        animateHeadline: function() {
            var headline = document.getElementById("animated-headline");
            var cursor = 0;

            var changeText = function(element, tween) {
                element.textContent = model.headlines[cursor++].title.rendered;
                if (cursor === model.headlines.length) {
                    cursor = 0;
                }
            };
            var tl = new TimelineMax({ repeat: -1, repeatDelay: 1.5, onRepeat: changeText, onRepeatParams: [headline, "{self}"] });
            tl.to(headline, 1.5, { opacity: 1, top: 0 });
            tl.to(headline, 1.5, { opacity: 0, top: 50, delay: 5 });
            tl.repeat();
        }
    }

    var bannerView = {
        centerLogo: function() {
            var title = document.getElementById('banner-title');
            var logo = document.getElementById('banner-logo');

            //TODO: Treba spravit pureJS
            //$(logo).height($(title).height());
        }
    }
    $(function() {
        $.getJSON('/kam-on-wp/wp-json/wp/v2/posts?per_page=3&orderby=date', function(data) {
            data.forEach(function(post) {
                postHeadlineController.addPostToHeadline(post);
            });
            postHeadlineController.displayPostsHeadline();
        });
        window.addEventListener('load', function() {
            //bannerView.centerLogo();
        }, false);
    });

}(jQuery));