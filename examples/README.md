# Example: three applications, their foundation and a gateway

```
 client ── Bearer token ──► gateway/ (Node, :8000) ── X-Identity: {id}.{exp}.{hmac} ──► notifications/ (:8002)
                                 │ RPC findUserByToken                                  GET /notifications
                                 ▼
 iam/ (:8001) ── users:register ──► stream ──► notifications/ ──► stream ──► analytics/
   User, source of UserShadow   shadow.changed   copy of users;  mail.sent   RecordSignup
                                user.registered  SendWelcome                 RecordMail
```

```
foundation/   example/foundation, required by the three: what they share
              Iam/Contracts/IamService  Iam/Services/IamRpcService  Iam/Shadows/UserShadow  Iam/Auth/GatewayTokens
              Iam/Events/UserRegistered  Notifications/Events/MailSent
```

```bash
./run.sh   # needs PHP 8.4, Composer, Node 18+ and Redis on localhost
```

It installs the three applications, starts iam and notifications, both consumers and the gateway,
then registers a user in iam. Notifications mails a welcome to the address in its own copy of the
user; analytics counts the registration and the mail; the client reads its inbox through the
gateway, which turns a wrong token away with a 401.

```
inbox: ["welcome"]
signups: 1, mails: 1
```
