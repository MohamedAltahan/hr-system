<?php

namespace Modules\Common\Enums;

enum StatusCodeEnum: int
{
    case Success = 200;
    case Created_successfully = 201;
    case Unprocessable_content = 422;
    case Bad_request = 400;
    case Unauthorized = 401;
    case Forbidden = 403;
    case Not_Found = 404;
    case Server_Error = 500;
    case CONFlICT = 409;
}
