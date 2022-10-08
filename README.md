### laravel-queues

configuring queues
1. `$timeout` by X number of seconds, after X seconds kill the job
2. `$tries` for Y times, if the job fails, try Y times before considering it a failed job (note Y = -1 means try for an unlimited amount of times)
3. `retryUntil()`, allows us to define specific conditions to retry (e.g. retry until a minute from now)
4. `$backoff` for Z seconds, means that after a failure wait for Z seconds before retrying
5. more workers means more jobs can be processed in parallel
6. `->onQueue('queueName')` to specify which queue the job should run on 
7. when running a worker (`php artisan queue:work`) specify `--queue=one,two`, to indicate priority. so the command `php artisan queue:work --queue=one,two` will start a new worker that will process jobs on queue one first before processing jobs on queue two
