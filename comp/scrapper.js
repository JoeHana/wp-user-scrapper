;(function($, window, document) {

    function ucfirst(string)
    {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    var getScript = function(attr) {
        var scripts = document.getElementsByTagName('script'),
            script = scripts[scripts.length - 1];

        return script.getAttribute(attr, -1)
    };

    var getUsers = function()
    {
        var $table = $('.wp-list-table.users');

        var $rows = $table.find('tr');

        var users = [];

        $rows.each(function()
        {
            var $row = $(this);

            var email = $row.find('.email').text().trim();
            var name  = $row.find('.name').text().trim();

            var name_clean = '';

            if(email.length || name.length)
            {
                name = name.toLowerCase();
                var parts = name.split(/\s/);

                parts = $.map(parts, function(val, i)
                {
                    return ucfirst(val);
                });

                name = parts.join(' ');
                var user = {name: name, email: email};
                users.push(user);
            }

        });

        return users;
    };

    var submitUsers = function(users, url, filename)
    {
        jQuery.post(url, {filename: filename, location: JSON.stringify(window.location), users: JSON.stringify(users, null, 4)}, function(data)
        {
            console.log(data);
        });
    }

    var run = function()
    {
        //var filename = prompt("Filename?");
        var submitUrl = getScript('data-url');

        var users = getUsers();

        //submitUsers(users, submitUrl, filename);
        submitUsers(users, submitUrl);
    }

    run();

} (window.jQuery, window, document));