<?php
/**
 * Copyright 2021 Google Inc.
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
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/master/spanner/README.md
 */

namespace Google\Cloud\Samples\Spanner;

// [START spanner_query_information_schema_database_options]
use Google\Cloud\Spanner\SpannerClient;

/**
 * Queries the default leader of a database.
 * Example:
 * ```
 * query_information_schema_database_options($instanceId, $databaseId);
 * ```
 *
 * @param string $instanceId The Spanner instance ID.
 * @param string $databaseId The Spanner database ID.
 */
function query_information_schema_database_options(string $instanceId, string $databaseId): void
{
    $spanner = new SpannerClient();
    $instance = $spanner->instance($instanceId);
    $database = $instance->database($databaseId);

    $results = $database->execute(
        "SELECT s.OPTION_NAME, s.OPTION_VALUE
        FROM INFORMATION_SCHEMA.DATABASE_OPTIONS s
        WHERE s.OPTION_NAME = 'default_leader'"
    );

    foreach ($results as $row) {
        $optionName = $row['OPTION_NAME'];
        $optionValue = $row['OPTION_VALUE'];
        printf("The $optionName for $databaseId is $optionValue" . PHP_EOL);
    }
    if (!$results->stats()['rowCountExact']) {
        printf("Database $databaseId does not have a value for option 'default_leader'");
    }
}
// [END spanner_query_information_schema_database_options]

// The following 2 lines are only needed to run the samples
require_once __DIR__ . '/../../testing/sample_helpers.php';
\Google\Cloud\Samples\execute_sample(__FILE__, __NAMESPACE__, $argv);
