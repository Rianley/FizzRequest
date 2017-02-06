# FizzRequest
a mini http request lib for php (简单的php请求类库)

## installation (安装)
- 直接使用composer命令  
```
composer require fizzday/fizzrequest
```
- 或者写入composer.json
```
{
    "require": {
        "fizzday/fizzrequest": "dev-master"
    }
}
```
## usage samples (使用示例)
### 示例
```
use Fizzday\FizzRequest\FizzRequest;

// 获取所有的参数
$req = FizzRequest::all();

// 获取指定数据
$age = FizzRequest::input('age');

// 获取请求方法
$method = FizzRequest::method(); // POST(GET, PUT...)
```

### 依赖注入调用
```
use Fizzday\FizzRequest\FizzRequest;

public function oper(FizzRequest $req)
{
    $age = $req->age;
    
    $all = $req->all();
    // or
    $all = $req->input(); // empty param default return all
    
    $method = $req->method();
}
```

## 文件上传需要自行使用 `$_FILES`

> 说明:  
默认采用了`addslashes` 安全过滤