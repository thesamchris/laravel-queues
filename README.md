### laravel-queues

notes on jobs
1. `$timeout` by X number of seconds, after X seconds kill the job
2. `$tries` for Y times, if the job fails, try Y times before considering it a failed job (note Y = -1 means try for an unlimited amount of times)
3. `retryUntil()`, allows us to define specific conditions to retry (e.g. retry until a minute from now)
4. `$backoff` for Z seconds, means that after a failure wait for Z seconds before retrying
    4.1. can be set to a range [Z1, Z2] or specify backoff time for each try so like [Z1, Z2, Z3] means wait for Z1 seconds after first attempt, Z2 seconds after second attempt and Z3 seconds after third attempt (and every attempt after that)
5. more workers means more jobs can be processed in parallel
6. `->onQueue('queueName')` to specify which queue the job should run on 
7. when running a worker (`php artisan queue:work`) specify `--queue=one,two`, to indicate priority. so the command `php artisan queue:work --queue=one,two` will start a new worker that will process jobs on queue one first before processing jobs on queue two
8. `$this->release(W)`, releases the job back to the queue after W seconds (not sure what this can be used for)
9. `$maxExceptions` is V, after the worker encounters V exceptions from this job, stop retrying.
10. when a job fails, it ends up in the `failed_jobs` table (if we are using the database queue_connection)
11. `php artisan queue:retry <failed_job_uuid>` can be used to add a failed job back into the queue so that it can be picked up by a worker
12. `failed($e)` is called after the job fails with error passed to it
13. `->delay(T)`, delay the job by T seconds
