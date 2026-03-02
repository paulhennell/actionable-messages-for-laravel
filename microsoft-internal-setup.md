 # Microsoft setup for Actionable Messages

To send Actionable messages requires some Microsoft account setup to authorise your messages. 

This document is an account of the process of setting up authorisation for an interal org sender in 2026. It is based off of this page - [Microsoft page](https://learn.microsoft.com/en-us/outlook/actionable-messages/enable-entra-token-for-actionable-messages) but with more explanation of which bits are needed where!
PR's detailing updates to this process, or for more global flow are gratefuly recieved.

**Note** You will need a https enabled url and a server that can send emails that are SPF/DKIM signed before begining. You will also need to be (or be on friendly terms with) a Microsoft 365 admin for your ORG

## Entra App registration
To register for the Actionable Email dashboard you need an Entra App created in your org.

If you do not have an existing app for your site:
- Vist Entra > [App Registrations](https://entra.microsoft.com/#view/Microsoft_AAD_RegisteredApps/ApplicationsListBlade/) > New Registration
- Chose the account type - Single tennat only for internal org use
- Ignore the redirect option

When created (or if you have an existing app for SSO) copy the *Application (client) ID* (`$AppId`) 
(This is the Originator ID need in .env)

## Actionable Email Developer Dashboard - Registration

You are unable to send actionable emails to anyone other than yourself without registering via the developer dashboard for your org.

- Vist - https://outlook.office.com/connectors/oam/publish > new provider
- Add a friendly name, then in the MsEntra Auth paste the `$AppId` from above
- Now copy the App Id Uri it generates (`$AppUri`)
- Add the sender email address you will send from (SPF/DKIM signed!)
- Add in the https: addresses you will call in actions
- Set scope of permission to Organization
- Add in the email of your friendly 365 admin!

### Approve the registration
- Someone with 365 permissions will need to approve the request at https://outlook.office.com/connectors/oam/admin

## Expose the API
You now need to link the provider to the App in entra:

- Return to the entra [app registrations](https://entra.microsoft.com/#view/Microsoft_AAD_RegisteredApps/ApplicationsListBlade/) you created
- Go to 'Expose an Api' and *at the very top (above Scopes section)* click 'add' for the Application ID URI
- Paste in the sidebar the `$AppUri` from the dashboard above
- Click on 'Add a scope' - (see if your 365 admin knows what this means! MS suggest 'Global.Test' as the scope which seems to work - Then add a name / description that it is for actionable mail)
- Your admin will now need to approve the scope
- Click on 'Add a client' and add the following (actionable messages client ID) as the client id `48af08dc-f6d2-435f-b2a7-069abd99c086` and tick to allow it access to the url/scope just added

## Package Auth
- The package must send emails with the Originator ID to the `$AppId` from the provider
- - Set `MICROSOFT_ORIGINATOR_ID=` in .env to provide this
- The package **must** send messages from the registered emails in the provider registration
- The package action urls **must** be https and match the url provided in the provider registration

Having done this, and had the entra app and Provider approved by a tennant admin you should now be able to send Actionable messages!

