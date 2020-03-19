<?php

namespace mderakhshi\ActivityLog;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use mderakhshi\Curl\Facades\Log;

class ActivityLogJob implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	protected $collection;
	protected $array;
	
	/**
	 * Create a new job instance.
	 *
	 * @param         $collection
	 * @param  array  $array
	 */
	public function __construct($collection, array $array)
	{
		$this->collection = $collection;
		$this->array      = $array;
	}
	
	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$collectionName       = $this->collection;
		Log::$collectionName($this->array);
	}
}
