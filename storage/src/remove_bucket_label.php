<?php
/**
 * Copyright 2017 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * For instructions on how to run the full sample:
 *
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/master/storage/README.md
 */

namespace Google\Cloud\Samples\Storage;

# [START storage_remove_bucket_label]
use Google\Cloud\Storage\StorageClient;

/**
 * Removes a label from a bucket.
 *
 * @param string $bucketName The name of your Cloud Storage bucket.
 *        (e.g. 'my-bucket')
 * @param string $labelName The name of the label to remove.
 *        (e.g. 'label-key-to-remove')
 */
function remove_bucket_label(string $bucketName, string $labelName): void
{
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    $labels = [$labelName => null];
    $bucket->update(['labels' => $labels]);
    printf('Removed label %s from %s' . PHP_EOL, $labelName, $bucketName);
}
# [END storage_remove_bucket_label]

// The following 2 lines are only needed to run the samples
require_once __DIR__ . '/../../testing/sample_helpers.php';
\Google\Cloud\Samples\execute_sample(__FILE__, __NAMESPACE__, $argv);
