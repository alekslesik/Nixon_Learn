<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

namespace TodoList;

use \TodoList\Dao\TodoDao;
use \TodoList\Dao\TodoSearchCriteria;
use \TodoList\Util\Utils;
use \TodoList\Validation\TodoValidator;

//@return string; get value from a key 'status' from array $_GET
$status = Utils::getUrlParam('status');
//validate $status who has got above; if not valid then throw exception
TodoValidator::validateStatus($status);
//create object TodoDao
$dao = new TodoDao();
//@return object TodoSearchCriteria; get object with set $status
$search = (new TodoSearchCriteria())
        ->setStatus($status);

//@return string; capitalize $status
$title = Utils::capitalize($status) . ' TODOs';
//@get object TodoSearchCriteria; @return
$todos = $dao->find($search);
