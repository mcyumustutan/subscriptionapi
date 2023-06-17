## About Project

This project basicly mobile device registration and subscription operations. (API) <br>
This project has a command for expired subscription and renewed if validated from operating system platform. (Worker)

## How to Deploy for Development

* I used [Devilbox](http://devilbox.org/) docker development stack
* [Laravel install on Devilbox](https://devilbox.readthedocs.io/en/latest/examples/setup-laravel.html)
* Supervisor configuration file must be ```path/to/Devilbox/autostart```
```
##### Example: path/to/Devilbox/autostart/start.sh #####
#!/bin/bash
echo "Hello World from mcy"
cd ./path/to/app/
chmod +x artisan
cp ./laravel-worker.conf /etc/supervisor/custom.d/laravel-worker.conf
```
* Devilbox main folder run ```./shell.sh``` and ```cd path/to/app/```
* run ```'php artisan migrate:fresh --seed'```

### Database Files
* Database scheme is ```subscriptionapi.sql```
* ```report.sql``` is records report by day and by operating system 
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
