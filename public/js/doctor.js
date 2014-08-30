/**
 * Created with PhpStorm.
 * User: ZyManch
 * Date: 30.08.14
 * Time: 12:00
 */
$(document).ready(function() {
    var $constructor = $('#constructor'),
        $destructor = $('#destructor'),
        template =
            '<div class="part">' +
                '<div class="title"></div>'+
                '<img>'+
                '<a class="btn btn-mini help-button" target="_blank">?</a>'+
            '</div>';

    $.fn.partEvents = function(part) {
        this.each(function() {
            var $this = $(this);
            //$this.data('part',part);
            $this.dblclick(function() {
                if (part.items.length == 0) {
                    $(this).
                        children('img').
                        animate({opacity: 0.25},250,function() {
                            $(this).addClass('error');
                        }).
                        animate({opacity: 1.00},250).
                        animate({opacity: 0.25},250,function() {
                            $(this).removeClass('error');
                        }).
                        animate({opacity: 1.00},250);
                } else {
                    $(part.items).each(function(index, value) {
                        $this.parent().addPart(value, part);
                    });
                    $this.remove();
                }
            });
        });
    }

    $.fn.addPart = function(part, parentPart) {
        this.each(function() {
            var $this = $(this),
                $template = $(template),
                $img = $template.children('img'),
                $title = $template.children('.title'),
                $help = $template.children('a'),
                pointPosLeft,
                pointPosTop,
                centerAngleRad;
            if (part.type == 'full') {
                $template.addClass('full');
            }
            $help.attr('href','/part/'+part.id);
            $template.css('width',part.zoom * part.width+'px');
            $template.css('height',part.zoom * part.height+'px');
            if (part.image) {
                $img.rotate(part.angle);
                $img.attr('src','/images/parts/'+part.image);
            } else {
                $img.remove();
            }
            if (parentPart) {
                if (part.parent_glue.first.x == part.width/2) {
                    centerAngleRad = part.parent_glue.first.y > part.height/2 ? Math.PI / 2 : Math.PI / 2;
                } else {
                    centerAngleRad = Math.atan((part.parent_glue.first.y - part.height/2)/(part.parent_glue.first.x - part.width/2));
                }
                pointPosLeft = parseInt(parentPart.block.css('left'),10) +
                    parentPart.zoom * part.width/2 + (part.parent_glue.first.x-part.width/2) * parentPart.zoom;
                pointPosTop = parseInt(parentPart.block.css('top'),10) + part.parent_glue.first.y;
                $template.css('left', (pointPosLeft - part.zoom*(part.child_glue.first.x))+'px');
                $template.css('top', (pointPosTop - part.zoom*(part.child_glue.first.y))+'px');
            }
            $title.text(part.title);
            part.block = $template;
            $template.partEvents(part);
            $this.append($template);

        });
    }

    $constructor.addPart(window.destination);
    $destructor.addPart(window.source);
});