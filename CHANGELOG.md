# Next release
**Maintenance**
 * Removed RMT from the project
 * Updated documentation links
 * Upgraded Security Checker to version 5

# 1.2.1

In order to be compatible with EngineBlock 5.9, Profile needed to stop using the SURFconextId. As Engine no longer releases it.

**Bugfix**
* Stop using SURFconextId as user identifier #114 

**Maintenance**
* Security updates #113

# Old releases

## VERSION 1  OPENCONEXT PROFILE
### Version 1.2 - Provide User Lifecycle support
#### 22/01.2019 15:38  1.2.0  initial release

### Version 1.1 - Various improvements to the 'My services' and 'My connections' pages
#### 24/05/2018 10:00  1.1.1  Allow service providers without NameIDFormat
#### 07/03/2018 10:00  1.1.0  SSO improvements, allow IDPs without contacts and better error templates

### Version 1.0 - Various improvements to the 'My services' and 'My connections' pages
#### 06/03/2018 12:23  1.0.3  Security patches for https://simplesamlphp.org/security/201803-01
#### 05/02/2018 12:23  1.0.2  Security patches for simplesamlphp/saml2 and paragonie/random_compat
#### 05/02/2018 12:23  1.0.1  SAML2 library upgrade and EB 5.5 compatibility changes
#### 15/01/2018 10:00  1.0.0  initial release


## VERSION 0  FIRST PRE-RELEASE OF PROFILE APPLICATION EXTRACTED FROM ENGINEBLOCK

### Version 0.6 - Changed consumption of EB Consent API due to changes in EB 5.2
#### 14/02/2017 13:46  0.6.0  initial release

### Version 0.5 - Apply ARP to attributes in My Services, requires EB >= 5.1
#### 03/11/2016 09:53  0.5.1  This patch fixes issues when applying the ARP to attributes without a definition known to Profile.
#### 01/11/2016 13:16  0.5.0  initial release

### Version 0.4 - Update Profile with improvements
#### 24/10/2016 13:11  0.4.0  initial release

### Version 0.3 - Made locale cookie more configurable, fixed dealing with mattribute multiplicity, corrected development ip for engineblock
#### 14/06/2016 10:58  0.3.0  initial release

### Version 0.2 - Added script to aid with deployment of tar-balls
#### 03/06/2016 10:06  0.2.0  initial release

### Version 0.1 - First pre-release of Profile application extracted from EngineBlock
#### 31/12/2015 13:51  0.1.0  initial release