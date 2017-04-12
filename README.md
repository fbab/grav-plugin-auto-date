# Auto Date Plugin

The fork of the official **Auto Date** Plugin is under work.
It will be designed for [Grav CMS](http://github.com/getgrav/grav) and automatically adds the current date and the current user to frontmatter when creating a new page and saving an existing page via the Admin plugin. 

## Description - TO BE COMPLETED

There's not much to this plugin, simply install it and whenever you create a new page via the admin plugin, the current date will be inserted in the frontmatter of the page and show up in the **Options** -> **Publishing** Tab.  The format of the date is dependent upon the value set in `system.yaml` under `pages: dateformat: default` and if not set will use `H:i d-m-Y` as the date format.
