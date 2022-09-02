## About Project

This application parses a file containing a list of schedules, splits each schedule into 15-minute long meeting slots and then outputs a list of available 15-minute meeting slots that can be booked by an animal owner.

## Running the app

For running the application simply use 
> php artisan serve

command from terminal.

There is also small postman collection named 
> firtsvet.postman_collection.json

for making the request actually

## Things that could be better

- Grabbing json file from request not from storage
- Comparing time(not scheduleId) to be able to sort data
- Check for schedule to be during one day
- Example, when comparing with second break time we could skipped comparing with previous break time
- More validation on schedule scheme

## License

[MIT license](https://opensource.org/licenses/MIT).
