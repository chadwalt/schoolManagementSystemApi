<?php

use Illuminate\Http\Response;

/**
 * Return response to the calling route.
 *
 * @param Response $status - Status code.
 * @param array    $data   - An array holding data
 *
 * @return Response
 */
function respondJson($status, $data)
{
    return response()->json($data, $status);
}
