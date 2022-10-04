<?php
/**
 * Copyright 2021 Google LLC
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
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/main/storage/README.md
 */

namespace Google\Cloud\Samples\Storage;

# [START storage_download_public_file]
use Google\Cloud\Storage\StorageClient;

/**
 * Download a public file using anonymous credentials.
 *
 * @param string $bucketName The name of your Cloud Storage bucket.
 * @param string $objectName The name of your Cloud Storage object.
 * @param string $destination The local destination to save the object.
 */
function download_public_file(string $bucketName, string $objectName, string $destination): void
{
    // $bucketName = 'my-bucket';
    // $objectName = 'my-object';
    // $destination = '/home/admin/downloads/my-object';

    // create a storage client without authentication
    $storage = new StorageClient([
    ]);

    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object($objectName);

    // set `shouldSignRequest` to false to force the client to not authenticate.
    // if you do not have any client configuration enabled (i.e. application
    // default credentials), that option can be omitted.
    $object->downloadToFile($destination, [
        'shouldSignRequest' => false,
    ]);

    printf(
        'Downloaded public object %s from bucket %s to %s',
        $objectName,
        $bucketName,
        $destination
    );
}
# [END storage_download_public_file]

// The following 2 lines are only needed to run the samples
require_once __DIR__ . '/../../testing/sample_helpers.php';
\Google\Cloud\Samples\execute_sample(__FILE__, __NAMESPACE__, $argv);
