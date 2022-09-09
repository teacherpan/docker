配置gitlab runner完成构建成功后的消息推送。当前仅能够处理PR及新建TAG事件.

== 环境变量

docker-compose.yml配置示例
```yaml
  environment:
    - SUCCESS=false
    - YZ_DING_TOKEN=yourDingRobotToken
    - APP_URL=yourAppUrl
```

== gitlab runner
gitlab runner示例使用配置代码：
```
workflow:
  rules:
    # only run on PR
    - if: $CI_PIPELINE_SOURCE == 'merge_request_event'

# 设置步骤（步骤间串行）
stages:
  - unit-test
  - notify
# 设置自动执行的管道名称
angular-test:
  # 前台使用docker来构建
  tags:
    - docker
  # 设置该管道属于的步骤，同步骤的管道并行执行
  stage: unit-test
  image: registry.cn-beijing.aliyuncs.com/mengyunzhi/node-chrome:14.16.0
  before_script:
    - cd web
  script:
    - pwd
    - npm install
    - npm run test -- --no-watch --no-progress --browsers=ChromeHeadlessCI

dingding-success:
  stage: notify
  tags:
    - docker
  image: registry.cn-beijing.aliyuncs.com/mengyunzhi/dingding:1.0.0
  variables:
    YZ_DING_TOKEN: "65adbb5f6d99955b86e0eff562e1d562e85086cc18740e5c07b22exxxx"
  script:
    - php /root/ding.php
```

成功执行将发送以下格式的markdown消息：

```markdown
## 😀 😃 😄 😁 😆
[PR的标题](PR的地址)运行成功，提交者: xxxx
```