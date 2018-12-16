define(function (require) {
	var elgg = require('elgg');
	var $ = require('jquery');
	
    $('#users_geolocation_btn').click(function(){
        $('#photos_geolocation-loader').removeClass('hidden');
        $('#photos_geolocation-result').html('');

        elgg.get('ajax/view/photosmap/photos_geolocation', {
            data: $(this).serialize(),
            success: function(data){
                $('#photos_geolocation-result').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                elgg.register_error(elgg.echo('amap_maps_api:error:request'));
            },
            complete: function(){
                $('#photos_geolocation-loader').addClass('hidden');
            }
        });

        return false;
    });
});
